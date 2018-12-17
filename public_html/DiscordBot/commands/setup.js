module.exports.run = async (client, receivedMessage, args, con) =>{
    console.log(args);
    const Discord = require('discord.js');
    const Format = require('date-format');
    console.log(args.length);
    if (args === 0) {
        console.log(`${args} one`);
        receivedMessage.channel.send('Thank you for using CitizenWarfare Bot, Your Premier Event Assistant!!');
        receivedMessage.channel.send('to make this as simple as possible this command is going to be a culmination of a few things.');
        receivedMessage.channel.send('First, the information i need is a channel id, and your organizations name.');
        receivedMessage.channel.send('if your organizations name has a space in it like this Omega Corporation, then you need to enter it like so Omega_Corporation');
        receivedMessage.channel.send('capitalization does not matter, the org name must be as it is on the event site.');
        receivedMessage.channel.send('So to recap, your command will look like this !setup {channel id} {channel 2 id} {organization_name');

        receivedMessage.channel.send('Here is a list of channels, this may take a few seconds to fully iterate.');
        receivedMessage.guild.channels.forEach((channel) => {
            if (channel.type === 'text') {
                receivedMessage.channel.send(` -- ${channel.name} ${channel.id}`);
            }
        });
    }else if (args === 2) {
        console.log(`${args} more then one`);
        console.log(`${Format('yyyy-MM-dd',new Date())}: ${args.length} arguments supplied, setting 1 channel and org info.`);
        //TODO::handle organization first then hooks.
        async function getData()
        {
            let org = args[0].replace('_', ' ');

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
            let org = args[0].replace('_', ' ');

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

        let orgId = await getData();
        if(orgId.err){
            console.log(`${Format('yyyy-MM-dd',new Date())} : `+console.error);
        }else{
            saved = await saveData(orgId);
            client.orgID = orgId;
        }

        console.log(`${Format('yyyy-MM-dd',new Date())}:${saved}`);
//TODO::End Org setup
        if (args.length === 2){
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
                        sql_pubchan = (`UPDATE discordbot SET public_channel_id = '${args[0]}' WHERE id = '${client.orgId}'`);

                        publicWebHook  = new Discord.WebhookClient(wb.id, wb.token);
                        sql_pubhook = (`UPDATE discordbot SET public_webhook_url = '${publicWebHook}' WHERE id = '${client.orgId}'`);

                        con.query(sql_pubchan, err => {
                            if (err) throw err;
                            console.log(`${Format('yyyy-MM-dd',new Date())}:Saved Channel ID: ${sql_pubchan}`)
                        });
                        con.query(sql_pubhook, err => {
                            if (err) throw err;
                            console.log(`${Format('yyyy-MM-dd',new Date())}:Saved Webhook: ${sql_pubhook}`)
                        });

                    })
                    .catch(console.error));
        }else if (args.length === 3){
            console.log(`${Format('yyyy-MM-dd',new Date())}: ${args.length} arguments supplied, 2 channels and org info.`);
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
                        sql_pubchan = (`UPDATE discordbot SET public_channel_id = '${args[0]}' WHERE id = '${client.orgId}'`);

                        publicWebHook  = new Discord.WebhookClient(wb.id, wb.token);
                        sql_pubhook = (`UPDATE discordbot SET public_webhook_url = '${publicWebHook}' WHERE id = '${client.orgId}'`);

                        con.query(sql_pubchan, err => {
                            if (err) throw err;
                            console.log(`${Format('yyyy-MM-dd',new Date())}:Saved Channel ID: ${sql_pubchan}`)
                        });
                        con.query(sql_pubhook, err => {
                            if (err) throw err;
                            console.log(`${Format('yyyy-MM-dd',new Date())}:Saved Webhook: ${sql_pubhook}`)
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
                        sql_privchan = (`UPDATE organizations SET private_channel_id = '${args[1]}'`);
                        privateWebHook  = new Discord.WebhookClient(wb.id, wb.token);
                        sql_pubhook = (`UPDATE organizations SET public_webhook_url = '${privateWebHook}'`);

                        /*myChannelPrivate.messages.get(myChannelPrivate.lastMessageID).author.send(`DO NOT MAKE THIS LINK PUBLIC!, Here is your Private Events webhook https://canary.discordapp.com/api/webhooks/${wb.id}/${wb.token}`)
                        privateWebhookID = wb.id;
                        privateWebhookToken = wb.token;
                        myChannelPrivate.messages.get(myChannelPrivate.lastMessageID).author.send('Now that we have this webhook, what i need you to do is copy the link and set this in your profile on https://events.citizenwarfare.com/profile')*/
                    })
                    .catch(err => {
                        console.log(err.stack);
                    }));
            //privateWebHook  = new Discord.WebhookClient(privateWebhookID, privateWebhookToken);
        }else{
            receivedMessage.channel.send('you gave to many parameters.')
        }
    }else{
        console.log(`${Format('yyyy-MM-dd',new Date())} : no args???`);
        receivedMessage.channel.send('something is wrong!')
    }
    };

module.exports.help = {
    name:'setup',
    usage: "start the bot setup process."
};