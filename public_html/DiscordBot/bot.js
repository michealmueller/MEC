const Discord = require('discord.js')
const client = new Discord.Client()
const channel = '';
const keys = require('./vars');

client.on('ready', () => {
    console.log("Connected as " + client.user.tag)
})

client.login(keys); // Replace XXXXX with your bot token

/*client.on('ready', () => {
    var generalChannel = client.channels.get("123456789") // Replace with known channel ID
    generalChannel.send("Hello, world!")
})*/

client.on('message', (receivedMessage) => {
    // Check if the bot's user was tagged in the message
    if (receivedMessage.content.startsWith("!")) {
        processCommand(receivedMessage)
    }
})

function processCommand(receivedMessage) {
    let fullCommand = receivedMessage.content.substr(1); // Remove the leading exclamation mark
    let splitCommand = fullCommand.split(" "); // Split the message up in to pieces for each space
    let primaryCommand = splitCommand[0]; // The first word directly after the exclamation is the command
    let arguments = splitCommand.slice(1); // All other words are arguments/parameters/options for the command

    console.log("Command received: " + primaryCommand);
    console.log("Arguments: " + arguments); // There may not be any arguments

    switch(primaryCommand){
        case 'help':
            helpCommand(arguments, receivedMessage);
            break;
        case 'setup':
            setupCommand(arguments, receivedMessage);
            break;
        case 'set-channel':
            setchannelCommand(arguments, receivedMessage);
            break;
        default:
            receivedMessage.channel.send("I don't understand the command. Try `!help``")
    }
}

function helpCommand(arguments, receivedMessage)
{
    if (arguments.length > 0) {
        receivedMessage.channel.send("It looks like you might need help with " + arguments)
    } else {
        receivedMessage.channel.send("I'm not sure what you need help with. Try `!help [topic]`")
    }
}

function setchannelCommand(arguments, receivedMessage) {
    if (arguments.length > 1) {
        receivedMessage.channel.send('Sorry, i can only use one channel at this time!')
    } else {
        var speak = client.channels.get(arguments);
        receivedMessage.channel.send('Great!, so you want me to post in the channel with the id of ' + arguments+' all future mesages will be in that channel.')
        speak.send('Hello, Im here now !')
    }
}

function setupCommand(arguments, receivedMessage)
{
    receivedMessage.channel.send('Thank you for using M.E.C Bot, Your Premier Event Assistant!!');
    receivedMessage.channel.send('First lets specify what channel you want me to be focus on, here is a list of the channels with there ID\'s')
    client.guilds.forEach((guild) => {
//first set the bots channel
// List all channels
        guild.channels.forEach((channel) => {
            if (channel.type === 'text') {
                receivedMessage.channel.send(` -- ${channel.name} ${channel.id}`);
            }
        })
    });
    receivedMessage.channel.send('Please use the command !set-channel to inform me of your choice.');

    receivedMessage.channel.send('First thing we will do is get you a webhook, this way i can reliably receive notifications and forward those to you.');
    receivedMessage.channel.send('Setting up the webhook now.');

}
/*
//Create the webhook and take care of user error and spaces
    const nameAvatar = args.join(" ");
    const linkCheck = /https?:\/\/.+\.(?:png|jpg|jpeg)/gi;
    if (!linkCheck.test(nameAvatar)) return receivedMessage.reply("You must supply an image link.");
    const avatar = nameAvatar.match(linkCheck)[0];
    const name = nameAvatar.replace(linkCheck, "");

    Webhook = receivedMessage.channel.createWebhook(name, avatar)
        .then(webhook => webhook.edit(name, avatar)
        .then(wb => receivedMessage.channel.send('Here is you webhook link, https://discordapp.com/api/webhooks/${wb.id}/${wb.token}'))
            .catch(console.error)
        receivedMessage.channel.send('Webhook created successfully!')

        receivedMessage.channel.send('there was an issue creating the WebHook, Contact my creator [Ω] Arthmael#9572 , and notify him of this please.')
}

  if (arguments.length > 0) {
        receivedMessage.channel.send("It looks like you might need help with " + arguments)
    } else {
        receivedMessage.channel.send("I'm not sure what you need help with. Try `!help [topic]`")
    }
    */