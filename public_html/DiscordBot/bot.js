const Discord = require('discord.js');
const botSettings = require('./botSettings');
const fs = require('fs');
const Format = require('date-format');

const client = new Discord.Client({disableEveryone:true});
const mysql = require('mysql');
const prefix = botSettings.prefix;

client.commands = new Discord.Collection();

fs.readdir('./commands/', (err, files) =>{
    if(err) console.error(err);

    let jsfiles = files.filter(f => f.split(".").pop() === 'js');
    if(jsfiles.length <= 0){
        console.log(Format('yyyy-MM-dd',new Date()) + ' there are no files!');
        return;
    }

    console.log(`Loading ${jsfiles.length} commands.`);

    jsfiles.forEach((f,i) =>{
       let props = require(`./commands/${f}`);
       console.log(Format('yyyy-MM-dd',new Date()) + ` ${i + 1}: ${f} loaded!`);
       client.commands.set(props.help.name, props);
    });
});

let con;


client.on('ready', () => {
    console.log(Format('yyyy-MM-dd',new Date()) + " Connected as " + client.user.tag);
});

client.login(botSettings.token); // Replace XXXXX with your bot token


client.on('message', async (receivedMessage)=> {
    /*if(receivedMessage.author.bot) return;
    if(receivedMessage.channel.type === 'dm') return;

    let messageArray = receivedMessage.content.split(/\s+/g);
    let command = messageArray[0];
    let args = messageArray.slice(1);

    if(!command.startsWith(prefix)) return;

    let cmd = client.commands.get(command.slice(prefix.length));
    if(cmd){
        console.log(`${Format('yyyy-MM-dd',new Date())}: Starting command ${cmd[0]}`);
        await cmd.run(client, receivedMessage, args, con);
        console.log(`${Format('yyyy-MM-dd',new Date())}: finished command ${cmd}`);
    }*/

    if (receivedMessage.content.startsWith("!")) {
        processCommand(receivedMessage)
    }

});

function processCommand(receivedMessage) {
    let fullCommand = receivedMessage.content.substr(1); // Remove the leading exclamation mark
    let splitCommand = fullCommand.split(" "); // Split the message up in to pieces for each space
    let primaryCommand = splitCommand[0]; // The first word directly after the exclamation is the command
    let args = splitCommand.slice(1); // All other words are args/parameters/options for the command

    //console.log("Command received: " + primaryCommand);
    //console.log("Arguments: " + args); // There may not be any args

    switch(primaryCommand){
        case 'help':
            helpCommand(args, receivedMessage);
            break;
        case 'setup':
            setupCommand(client, receivedMessage, args, con);
            break;
        case 'test':
            test(client, receivedMessage, args, con);
            break;
        default:
            receivedMessage.channel.send("I don't understand the command. Try `!help``")
    }
}

async function setupCommand(client, receivedMessage, args, con)
{
    const Format = require('date-format');
    if(args.length === 2){
        receivedMessage.guild.channels.forEach((channel) => {
            if(channel.name === args[0]){
                client.channelID = channel.id;
                console.log(client.channelID);
            }
        });
    }else if(args.length === 3){
        receivedMessage.guild.channels.forEach((channel) => {
            if(channel.name === args[0]){
                client.channelID = channel.id;
            }
            if(channel.name === args[1]){
                client.channel2ID = channel.id;
            }
        });
    }
    if (args.length === 0) {
        receivedMessage.channel.send('Thank you for using CitizenWarfare Bot, Your Premier Event Assistant!!');
        receivedMessage.channel.send('if your organizations name has a space in it like this Omega Corporation, then you need to enter it like so Omega_Corporation');
        receivedMessage.channel.send('capitalization does not matter, the org name must be as it is on the event site.');
        receivedMessage.channel.send('So to recap, your command will look like this !setup {channel} {channel} {organization_name');
    }else if (args.length >= 2) {
        con = mysql.createConnection({
            host:botSettings.dbhost,
            user:botSettings.dbuser,
            password:botSettings.dbpass,
            database:botSettings.dbdatabase
        });
        con.connect(err => {
            if (err) throw err;
            console.log(Format('yyyy-MM-dd',new Date()) + " Connected to DB");
        });

        console.log(`${Format('yyyy-MM-dd',new Date())}: Do not panic this may take a second, check your event channel(s)`);
        await receivedMessage.channel.send('Do not panic this may take a second, check your event channel(s) :wink:');
        if (args.length === 2){
            //TODO::handle organization first then hooks.
            async function getData()
            {
                let org = args[1].replace('_', ' ');

                return new Promise((resolve, reject) =>{

                    let sql = `select id from organizations where org_name = ?`;

                    con.query(sql, [org],(err, result) => {
                        if (err){
                            reject(err);
                        } else{
                            resolve(result[0].id);
                        }
                    });
                }).catch(console.error());

            }

            async function saveData(orgID)
            {
                let org = args[1].replace('_', ' ');

                return new Promise((resolve, reject) => {
                    let sql_check = `SELECT id FROM discordbot WHERE organization_id=?`;
                    con.query(sql_check, [orgID],(err, result) => {
                        if (err){
                            reject(err);
                        } else{
                            if(result.length < 1){
                                let sql = `INSERT INTO discordbot(organization_id, organization_name) VALUES ('${orgID}', '${org}')`;
                                con.query(sql,(err, result) => {
                                    if (err){
                                        reject(err);
                                    } else{
                                        resolve(' Added Organization to DB.')
                                    }
                                });
                            }else{
                                console.log(`${Format('yyyy-MM-dd',new Date())} this organization has already been added! Org name => ${org}`);
                                receivedMessage.channel.send('You have already ran this command and your information has been saved.');
                            }
                        }
                    });
                }).catch(console.error());
            }

            let orgId = await getData().catch(`${Format('yyyy-MM-dd',new Date())}: there was an error FETCHING the data!`);
            if(orgId.err){
                console.log(`${Format('yyyy-MM-dd',new Date())} : `+console.error);
            }else{
                saved = await saveData(orgId).catch(`${Format('yyyy-MM-dd',new Date())}: there was an error SAVING the data!`);
                client.orgID = orgId;
            }

            console.log(`${Format('yyyy-MM-dd',new Date())}:${saved}`);
//TODO::1 channel and org name
//TODO::now hanndle the channel id and hooks.

            myChannelPublic = client.channels.get(`${args[0]}`);
            myChannelPublic.send('I\'m Over here now ! :D');
            myChannelPublic.send('so now that we have established my home. You are DONE!! i will keep an eye on the events and inform you of a new event!');
            //myChannelPublic.send('this one is easy, all i need is a single command. type !webhook-setup');

            myChannelPublic.createWebhook("CitizenWarfare Public Event", "https://events.citizenwarfare.com/storage/app/logos/Citizen_Warfare_Profile_Pic_White.png")
            // This will actually set the webhooks avatar, as mentioned at the start of the guide.
                .then(webhook => webhook.edit("CitizenWarfare Public Event", "https://events.citizenwarfare.com/storage/app/logos/Citizen_Warfare_Profile_Pic_White.png")
                // This will get the bot to DM you the webhook
                    .then(wb => {
                        //save pub and private channels along with webhooks
                        publicWebHook = `https://discordapp.com/api/webhooks/${wb.id}/${wb.token}`;
                        let sql_pub = (`UPDATE discordbot SET public_channel_id = '${client.channelID}', public_webhook_url = '${publicWebHook}' WHERE organization_id = '${client.orgID}'`);

                        con.query(sql_pub, err => {
                            if (err) throw err;
                            console.log(`${Format('yyyy-MM-dd',new Date())}: Updated Public Channel ID and WebHook`)
                        });

                    })
                    .catch(console.error));
            con.end();
        }
        else if (args.length === 3){
            //TODO::handle organization first then hooks.
            async function getData()
            {
                let org = args[2].replace('_', ' ');

                return new Promise((resolve, reject) =>{

                    let sql = `select id from organizations where org_name = ?`;

                    con.query(sql, [org],(err, result) => {
                        if (err){
                            reject(err);
                        } else{
                            resolve(result[0].id);
                        }
                    });
                }).catch(console.error());

            }

            async function saveData(orgID)
            {
                let org = args[2].replace('_', ' ');

                return new Promise((resolve, reject) => {
                    let sql_check = `SELECT id FROM discordbot WHERE organization_id=?`;
                    con.query(sql_check, [orgID],(err, result) => {
                        if (err){
                            reject(err);
                        } else{
                            if(result.length < 1){
                                let sql = `INSERT INTO discordbot(organization_id, organization_name) VALUES ('${orgID}', '${org}')`;
                                con.query(sql,(err, result) => {
                                    if (err){
                                        reject(err);
                                    } else{
                                        resolve(' Added Organization to DB.')
                                    }
                                });
                            }else{
                                console.log(`${Format('yyyy-MM-dd',new Date())} this organization has already been added! Org name => ${org}`);
                                receivedMessage.channel.send('You have already ran this command and your information has been saved.');
                            }
                        }
                        //client.orgID = result[0].id;
                    });
                }).catch(console.error());
            }

            let orgId = await getData().catch(`${Format('yyyy-MM-dd',new Date())}: there was an error FETCHING the data!`);
            if(orgId.err){
                console.log(`${Format('yyyy-MM-dd',new Date())} : `+console.error);
            }else{
                saved = await saveData(orgId).catch(`${Format('yyyy-MM-dd',new Date())}: there was an error SAVING the data!`);
                client.orgID = orgId;
            }

            console.log(`${Format('yyyy-MM-dd',new Date())}:${saved}`);

//TODO::2 channels and org name
//TODO:: public channel setup first
            myChannelPublic = client.channels.get(`${args[0]}`);
            myChannelPublic.send('I\'m Over here now ! :D');
            myChannelPublic.send('so now that we have established my home. You are DONE!! i will keep an eye on the events and post when there is an public event!');
            //myChannelPublic.send('this one is easy, all i need is a single command. type !webhook-setup');

            myChannelPublic.createWebhook("CitizenWarfare Public Event", "https://events.citizenwarfare.com/storage/app/logos/Citizen_Warfare_Profile_Pic_White.png")
            // This will actually set the webhooks avatar, as mentioned at the start of the guide.
                .then(webhook => webhook.edit("CitizenWarfare Public Event", "https://events.citizenwarfare.com/storage/app/logos/Citizen_Warfare_Profile_Pic_White.png")
                // This will get the bot to DM you the webhook
                    .then(wb => {
                        //save pub and private channels along with webhooks

                        publicWebHook = `https://discordapp.com/api/webhooks/${wb.id}/${wb.token}`;
                        console.log(publicWebHook);
                        let sql_pub = (`UPDATE discordbot SET public_channel_id = '${client.channelID}', public_webhook_url = '${publicWebHook}' WHERE organization_id = '${client.orgID}'`);
                        //let sql_pubhook = (`UPDATE discordbot SET public_webhook_url = '${publicWebHook}' WHERE id = '${client.orgID}'`);

                        con.query(sql_pub, err => {
                            if (err) throw err;
                            console.log(`${Format('yyyy-MM-dd',new Date())}: Updated Public Channel ID and WebHook`)
                        });

                    })
                    .catch(console.error));
//TODO::now the private.
            myChannelPrivate = client.channels.get(`${args[1]}`);
            myChannelPrivate.send('And here now ! :D');
            myChannelPrivate.send('I will also keep an eye on private events and post them here!');

            myChannelPrivate.createWebhook("CitizenWarfare Private Event", "https://events.citizenwarfare.com/storage/app/logos/Citizen_Warfare_Profile_Pic_White.png")
            // This will actually set the webhooks avatar, as mentioned at the start of the guide.
                .then(webhook => webhook.edit("CitizenWarfare Private Event", "https://events.citizenwarfare.com/storage/app/logos/Citizen_Warfare_Profile_Pic_White.png")
                // This will get the bot to DM you the webhook
                    .then(wb => {
                        privateWebHook = `https://discordapp.com/api/webhooks/${wb.id}/${wb.token}`;
                        sql_priv = (`UPDATE discordbot SET private_channel_id = '${client.channel2ID}', private_webhook_url = '${privateWebHook}' WHERE organization_id = ${client.orgID}`);

                        con.query(sql_priv, err => {
                            if (err) throw err;
                            console.log(`${Format('yyyy-MM-dd',new Date())}: Updated Private Channel ID and WebHook`)
                        });
                    })
                    .catch(err => {
                        console.log(err.stack);
                    }));
            con.end();
        }
        else{
            receivedMessage.channel.send('you gave to many parameters.')
        }
    }else{
        console.log(`${Format('yyyy-MM-dd',new Date())} : no args???`);
        receivedMessage.channel.send('something is wrong!')
    }
}

function test(client, receivedMessage, args, con){
    receivedMessage.guild.channels.forEach((channel) => {
        if(channel.name === args[0]){
            client.channelID = channel.id;
            console.log(client.channelID);
        }
    });
}