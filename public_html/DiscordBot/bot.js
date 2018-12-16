const Discord = require('discord.js')
const client = new Discord.Client();
const Guild = new Discord.Guild();
const keys = require('./vars');

let myChannelPublic;
let myChannelPrivate;
let publicWebhookID;
let publicWebhookToken;
let privateWebhookID;
let privateWebhookToken;
let publicWebHook;
let privateWebHook;
let numEventChans;

client.on('ready', () => {
    console.log("Connected as " + client.user.tag)
});

client.login(keys.token); // Replace XXXXX with your bot token


client.on('message', (receivedMessage) => {
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
            setupCommand(args, receivedMessage);
            break;
        case 'set-channel':
            setchannelCommand(args, receivedMessage, myChannelPublic, myChannelPrivate);
            break;
        case 'test':
            testCommand(WebhookToken, WebhookID, myChannel);
            break;
        default:
            receivedMessage.channel.send("I don't understand the command. Try `!help``")
    }
}


function helpCommand(args, receivedMessage)
{
    if (arguments.length > 0) {
        receivedMessage.channel.send("It looks like you might need help with " + arguments)
    } else {
        receivedMessage.channel.send("I'm not sure what you need help with. Try `!help [topic]`")
    }
}

function setupCommand(args, receivedMessage)
{
    if(args <= 0) {
        receivedMessage.channel.send('Thank you for using CitizenWarfare Bot, Your Premier Event Assistant!!');
        receivedMessage.channel.send('Do you want to split the events up into public and private? this will require 2 channels.');
        receivedMessage.channel.send('The first channel will be the public events and the second will be private events.');
        receivedMessage.channel.send('private channels are generally used for inner organization events, those that you would not want other orgs to see / know about.')
        receivedMessage.channel.send('use !setup 1 or !setup 2, 1 for a single event channel or 2 for dual event channels.');
        if (args) {
            if (args == '1') {
                numEventChans = 1;
            } else if (args == '2') {
                numEventChans = 2;
            } else if (args >= 3) {
                receivedMessage.channel.send('you can only choose 1 or 2 at this time.')
            }
        }
    }else if(args > 0) {
//CHANNEL LISTING
//first set the bots channel
// List all channels
        receivedMessage.channel.send('First lets specify what channels you want me to focus on, here is a list of the channels with there ID\'s, this may take a min.')
        receivedMessage.guild.channels.forEach((channel) => {
            if (channel.type === 'text') {
                receivedMessage.channel.send(` -- ${channel.name} ${channel.id}`);
            }
        })
        receivedMessage.channel.send('Please use the command "!set-channel {channel id} {channel id}" to inform me of your choice.');
    }
}

function setchannelCommand(args, receivedMessage, myChannelPublic, myChannelPrivate)
{
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

        myChannelPublic = client.channels.get(`${args[0]}`);
        myChannelPrivate = client.channels.get(`${args[1]}`);
        myChannelPublic.send('I\'m Over here now ! :D');
        myChannelPrivate.send('And here now ! :D');
        myChannelPublic.send('so now that we have established my home. lets set the webhook up so that i can start being useful!');
        myChannelPublic.send('this one is easy, all i need is a single command. type !webhook-setup');
    }
//WEBHOOK SETUP
    if(receivedMessage.channel.id == myChannelPublic.id || receivedMessage.channel.id == myChannelPrivate.id){
// This will create the webhook with the name "Example Webhook" and an example avatar.
        myChannelPublic.createWebhook("CitizenWarfare Public Event", "https://i.imgur.com/p2qNFag.png")
        // This will actually set the webhooks avatar, as mentioned at the start of the guide.
            .then(webhook => webhook.edit("M.E.C Public Event", "https://i.imgur.com/p2qNFag.png")
            // This will get the bot to DM you the webhook
                .then(wb => {
                    myChannelPublic.messages.get(myChannelPublic.lastMessageID).author.send(`DO NOT MAKE THIS LINK PUBLIC!, Here is your Public Events webhook https://canary.discordapp.com/api/webhooks/${wb.id}/${wb.token}`)
                    publicWebhookID = wb.id;
                    publicWebhookToken = wb.token;
                    myChannelPublic.messages.get(myChannelPublic.lastMessageID).author.send('Now that we have this webhook, what i need you to do is copy the link and set this in your profile on https://events.citizenwarfare.com/profile')
                })
                .catch(console.error));
//private setup
        myChannelPrivate.createWebhook("CitizenWarfare Private Event", "https://i.imgur.com/p2qNFag.png")
        // This will actually set the webhooks avatar, as mentioned at the start of the guide.
            .then(webhook => webhook.edit("M.E.C Private Event", "https://i.imgur.com/p2qNFag.png")
            // This will get the bot to DM you the webhook
                .then(wb => {
                    myChannelPrivate.messages.get(myChannelPrivate.lastMessageID).author.send(`DO NOT MAKE THIS LINK PUBLIC!, Here is your Private Events webhook https://canary.discordapp.com/api/webhooks/${wb.id}/${wb.token}`)
                    privateWebhookID = wb.id;
                    privateWebhookToken = wb.token;
                    myChannelPrivate.messages.get(myChannelPrivate.lastMessageID).author.send('Now that we have this webhook, what i need you to do is copy the link and set this in your profile on https://events.citizenwarfare.com/profile')
                })
                .catch(console.error));
        publicWebHook  = new Discord.WebhookClient(publicWebhookID, publicWebhookToken);
        privateWebHook  = new Discord.WebhookClient(privateWebhookID, privateWebhookToken);
    }
}

function testCommand(args, WebhookToken, WebhookID)
{
    console.log(args);
}