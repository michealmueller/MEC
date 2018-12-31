module.exports.run = async (client, receivedMessage, args, con) => {

    const Discord = require('discord.js');
    const Format = require('date-format');
    const mysql = require('mysql');

    let botSettings = require('../botSettings');
    if (args.length === 2) {
        receivedMessage.guild.channels.forEach((channel) => {
            if (channel.name === args[0]) {

                client.channelID = channel.id;
            }
        });
    } else if (args.length === 3) {
        receivedMessage.guild.channels.forEach((channel) => {
            if (channel.name === args[0]) {
                client.channelID = channel.id;
            }
            if (channel.name === args[1]) {
                client.channel2ID = channel.id;
            }
        });
    }
    if (args.length === 0) {
        receivedMessage.channel.send('Thank you for using CitizenWarfare Bot, Your Premier Event Assistant!!');
        receivedMessage.channel.send('if your organizations name has a space in it like this Omega Corporation, then you need to enter it like so Omega_Corporation');
        receivedMessage.channel.send('capitalization does not matter, the org name must be as it is on the event site.');
        receivedMessage.channel.send('So to recap, your command will look like this !setup {channel} {channel} {organization_name');
    } else if (args.length >= 2) {
        try {
            con = await mysql.createConnection({
                host: botSettings.dbhost,
                user: botSettings.dbuser,
                password: botSettings.dbpass,
                database: botSettings.dbdatabase,

            });
            if (con) {
                con.connect(err => {
                    if (err) throw err;

                });
            }
        } catch (e) {
            console.log(`${Format('yy-MM-dd hh:mm', new Date())}:` + e);
        }

        if (args.length === 2) {
            await receivedMessage.channel.send('Do not panic this may take a second, check your event channel(s) :wink:');

            //TODO::handle organization first then hooks.
            async function getData() {
                let org = args[1].replace('_', ' ');

                return new Promise((resolve, reject) => {

                    let sql = `select id from organizations where org_name = ?`;

                    con.query(sql, [org], (err, result) => {
                        if (err) {
                            reject(err);
                        } else {
                            if (result.length > 0) {
                                resolve(result[0].id);
                            } else {
                                reject(err);
                            }
                        }
                    });
                })

            }

            async function saveData(orgID, discord_priv, discord_pub='') {
                let org = args[2].replace('_', ' ');

                return new Promise((resolve, reject) => {
                    let sql_check = `SELECT id FROM discordbot WHERE organization_id=?`;
                    con.query(sql_check, [orgID], (err, result) => {
                        if (err) {
                            reject(err);
                        } else {
                            if (result.length < 1) {
                                let sql = `INSERT INTO discordbot(organization_id, organization_name, private_webhook_url) VALUES ('${orgID}', '${org}', '${discord_priv}')`;
                                con.query(sql, (err, result) => {
                                    if (err) {
                                        reject(err);
                                    } else {
                                        resolve(' Added Organization to DB.')
                                    }
                                });
                            } else {
                                console.log(`${Format('yy-MM-dd hh:mm', new Date())} this organization has already been added! Org name => ${org}`);
                                receivedMessage.channel.send('You have already ran this command and your information has been saved.');
                            }
                        }
                        //client.orgID = result[0].id;
                    });
                }).catch(err => {
                    throw new Error(`Bigf error -- ${err}`)
                });
            }

            await getData()
                .then(orgId => {
                    myChannelPrivate = client.channels.get(`${client.channel2ID}`);
                    myChannelPrivate.send('And here now ! :D');
                    myChannelPrivate.send('I will also keep an eye on private events and post them here!');

                    myChannelPrivate.createWebhook("CitizenWarfare Private Event", "https://events.citizenwarfare.com/storage/app/logos/Citizen_Warfare_Profile_Pic_White.png")
                    // This will actually set the webhooks avatar, as mentioned at the start of the guide.
                        .then(webhook => webhook.edit("CitizenWarfare Private Event", "https://events.citizenwarfare.com/storage/app/logos/Citizen_Warfare_Profile_Pic_White.png")
                        // This will get the bot to DM you the webhook
                            .then(wb => {
                                privateWebHook = `https://discordapp.com/api/webhooks/${wb.id}/${wb.token}`;
                                sql_priv = (`UPDATE discordbot SET private_channel_id = '${client.channel2ID}', private_webhook_url = '${privateWebHook}' WHERE organization_id = ${client.orgID}`);

                                /*con.query(sql_priv, err => {
                                    if (err) throw err;
                                    console.log(`${Format('yy-MM-dd hh:mm', new Date())}: Updated Private Channel ID and WebHook`)
                                });*/

                                client.privateWebHook = privateWebHook;
                                client.privateChannelid = myChannelPrivate.id;
                            })
                            .catch(err => {
                                console.log(`There was an error creating the webhooks!` + err);
                                myChannelPrivate.send(`Could not create the Webhook, this could be because you have to many !( limit is 10), here is the error. -> ${err}`);
                            }));
                    //save all data.
                    saveData(orgId, client.privateWebHook)
                        .then(saved =>{
                            console.log(`${Format('yy-MM-dd hh:mm', new Date())}: ${saved}`)
                        })
                }).catch(err => {
                    console.log(`${Format('yy-MM-dd hh:mm', new Date())}: there was an error SAVING the data!, error->` + err.stack)
                });

//TODO::1 channel and org name
//TODO::now hanndle the channel id and hooks.

        } else if (args.length === 3) {
            await receivedMessage.channel.send('Do not panic this may take a second, check your event channel(s) :wink:');

            //TODO::handle organization first then hooks.
            async function getData() {
                let org = args[2].replace('_', ' ');

                return new Promise((resolve, reject) => {

                    let sql = `select id from organizations where org_name = ?`;

                    con.query(sql, [org], (err, result) => {
                        if (err) {
                            reject(err);
                        } else {
                            if (result.length > 0) {
                                resolve(result[0].id);
                            } else {
                                reject(err);
                            }
                        }
                    });
                })

            }

            async function saveData(orgID, discord_priv, discord_pub) {
                let org = args[2].replace('_', ' ');

                return new Promise((resolve, reject) => {
                    let sql_check = `SELECT id FROM discordbot WHERE organization_id=?`;
                    con.query(sql_check, [orgID], (err, result) => {
                        if (err) {
                            reject(err);
                        } else {
                            if (result.length < 1) {
                                let sql = `INSERT INTO discordbot(organization_id, organization_name, private_webhook_url, public_webhook_url) VALUES ('${orgID}', '${org}', '${discord_priv}', '${discord_pub}')`;
                                con.query(sql, (err, result) => {
                                    if (err) {
                                        reject(err);
                                    } else {
                                        resolve(' Added Organization to DB.')
                                    }
                                });
                            } else {
                                console.log(`${Format('yy-MM-dd hh:mm', new Date())} this organization has already been added! Org name => ${org}`);
                                receivedMessage.channel.send('You have already ran this command and your information has been saved.');
                            }
                        }
                        //client.orgID = result[0].id;
                    });
                }).catch(err => {
                    throw new Error(`Bigf error -- ${err}`)
                });
            }

            await getData()
                .then(orgId => {
                        //TODO::2 channels and org name
//TODO:: public channel setup first
                        myChannelPublic = client.channels.get(`${client.channelID}`);
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
                                    //console.log(publicWebHook);
                                    let sql_pub = (`UPDATE discordbot SET public_channel_id = '${client.channelID}', public_webhook_url = '${publicWebHook}' WHERE organization_id = '${client.orgID}'`);

                                    /*con.query(sql_pub, err => {
                                        if (err) throw err;
                                        console.log(`${Format('yy-MM-dd hh:mm', new Date())}: Updated Public Channel ID and WebHook`)
                                    });*/

                                    client.publicWebHook = publicWebHook;
                                    client.publicChannelid = myChannelPublic.id;
                                })
                                .catch(err=>{
                                    console.log(`There was an error creating the webhooks!` + err);
                                    myChannelPublic.send(`Could not create the Webhook, this could be because you have to many !( limit is 10), here is the error. -> ${err}`);
                                }));
//TODO::now the private.
                        myChannelPrivate = client.channels.get(`${client.channel2ID}`);
                        myChannelPrivate.send('And here now ! :D');
                        myChannelPrivate.send('I will also keep an eye on private events and post them here!');

                        myChannelPrivate.createWebhook("CitizenWarfare Private Event", "https://events.citizenwarfare.com/storage/app/logos/Citizen_Warfare_Profile_Pic_White.png")
                        // This will actually set the webhooks avatar, as mentioned at the start of the guide.
                            .then(webhook => webhook.edit("CitizenWarfare Private Event", "https://events.citizenwarfare.com/storage/app/logos/Citizen_Warfare_Profile_Pic_White.png")
                            // This will get the bot to DM you the webhook
                                .then(wb => {
                                    privateWebHook = `https://discordapp.com/api/webhooks/${wb.id}/${wb.token}`;
                                    sql_priv = (`UPDATE discordbot SET private_channel_id = '${client.channel2ID}', private_webhook_url = '${privateWebHook}' WHERE organization_id = ${client.orgID}`);

                                    /*con.query(sql_priv, err => {
                                        if (err) throw err;
                                        console.log(`${Format('yy-MM-dd hh:mm', new Date())}: Updated Private Channel ID and WebHook`)
                                    });*/

                                    client.privateWebHook = privateWebHook;
                                    client.privateChannelid = myChannelPrivate.id;
                                })
                                .catch(err => {
                                    console.log(`There was an error creating the webhooks!` + err);
                                    myChannelPrivate.send(`Could not create the Webhook, this could be becasue you have to many !( limit is 10), here is the error. -> ${err}`);
                                }));
                        //save all data.
                        saveData(orgId, client.privateWebHook, client.publicWebHook)
                            .then(saved =>{
                                console.log(`${Format('yy-MM-dd hh:mm', new Date())}: ${saved}`)
                            })
                    })
                    .catch(err => {
                        console.log(`${Format('yy-MM-dd hh:mm', new Date())}: there was an error FETCHING the data!, error ->` + err)
                    });
        } else if(args.length >=4)
        {
            receivedMessage.channel.send('you gave to many parameters.')
        }
    }
};

module.exports.help = {
    name:'setup',
};