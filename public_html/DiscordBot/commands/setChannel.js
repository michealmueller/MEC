module.exports.run = (client, receivedMessage, args, con) =>{
//let botSettings = require('../botSettings');
    const Discord = require('discord.js');

    if (args.length > 2) {
        receivedMessage.channel.send('Sorry, i can only use up to 2 channels.')
    } else {
        if(args.length > 1){
            chans = {
                "public":args[0],
                "private": args[1]
            }
        }
        receivedMessage.channel.send('Great!, so you want me to post in the channel with the id of ' + args +' all future messages will be in that / those channel(s).');
//set the channel to use and send all messages there now .

        if(args.length === 1) {
            myChannelPublic = client.channels.get(`${args[0]}`);
            myChannelPublic.send('I\'m Over here now ! :D');
            //myChannelPublic.send('so now that we have established my home. lets set the webhook up so that i can start being useful!');
            //myChannelPublic.send('this one is easy, all i need is a single command. type !webhook-setup');
        }else if(args.length === 2){
            myChannelPrivate = client.channels.get(`${args[1]}`);
            myChannelPrivate.send('And here now ! :D');
        }}
//WEBHOOK SETUP
    if(receivedMessage.channel.id == myChannelPublic.id){
// This will create the webhook with the name "Example Webhook" and an example avatar.
        myChannelPublic.createWebhook("CitizenWarfare Public Event", "https://i.imgur.com/p2qNFag.png")
        // This will actually set the webhooks avatar, as mentioned at the start of the guide.
            .then(webhook => webhook.edit("CitizenWarfare Public Event", "https://i.imgur.com/p2qNFag.png")
            // This will get the bot to DM you the webhook
                .then(wb => {
                    console.log(client.organizationID);
                    //save pub and private channels along with webhooks
                    sql_pubchan = (`UPDATE organizations SET public_channel_id = '${args[0]}' WHERE id = '${client.organizationID}'`);

                    publicWebHook  = new Discord.WebhookClient(wb.id, wb.token);
                    sql_pubhook = (`UPDATE organizations SET public_webhook_url = '${publicWebHook}' WHERE id = '${client.organizationID}'`);

                    con.query(sql_pubchan, err => {
                        if (err) throw err;
                    });
                    con.query(sql_pubhook, err => {
                        if (err) throw err;
                    });
                    /*myChannelPublic.messages.get(myChannelPublic.lastMessageID).author.send(`DO NOT MAKE THIS LINK PUBLIC!, Here is your Public Events webhook https://canary.discordapp.com/api/webhooks/${wb.id}/${wb.token}`)
                    publicWebhookID = wb.id;
                    publicWebhookToken = wb.token;
                    myChannelPublic.messages.get(myChannelPublic.lastMessageID).author.send('Now that we have this webhook, what i need you to do is copy the link and set this in your profile on https://events.citizenwarfare.com/profile')*/
                })
                .catch(console.error));

        //publicWebHook  = new Discord.WebhookClient(publicWebhookID, publicWebhookToken);
    }
    if(args.length === 2 && receivedMessage.channel.id === myChannelPrivate.id){
        myChannelPrivate.createWebhook("CitizenWarfare Private Event", "https://i.imgur.com/p2qNFag.png")
        // This will actually set the webhooks avatar, as mentioned at the start of the guide.
            .then(webhook => webhook.edit("CitizenWarfare Private Event", "https://i.imgur.com/p2qNFag.png")
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
    }
};

module.exports.help = {
    name:'set-channel',
    usage: "sets the bots prefered channel(s)"
};