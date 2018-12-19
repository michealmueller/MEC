const Discord = require('discord.js');
const botSettings = require('./botSettings');
const fs = require('fs');
const Format = require('date-format');

const client = new Discord.Client({disableEveryone:true});

const prefix = botSettings.prefix;

client.commands = new Discord.Collection();

fs.readdir('./commands/', (err, files) =>{
    if(err) console.error(err);

    let jsfiles = files.filter(f => f.split(".").pop() === 'js');
    if(jsfiles.length <= 0){
        console.log(Format('yy-MM-dd hh:mm',new Date()) + ' there are no files!');
        return;
    }

    console.log(`Loading ${jsfiles.length} commands.`);

    jsfiles.forEach((f,i) =>{
       let props = require(`./commands/${f}`);
       console.log(`${Format('yy-MM-dd hh:mm',new Date())} ${i + 1}: ${f} loaded!`);
       client.commands.set(props.help.name, props);
    });
});
let con;


client.on('ready', () => {
    console.log(`${Format('yy-MM-dd hh:mm',new Date())}: Connected as ${client.user.tag}`);
    console.log(`${Format('yy-MM-dd hh:mm',new Date())}: Server List:`);
    console.log(`${Format('yy-MM-dd hh:mm',new Date())}: Currently Connected to ${client.guilds.array().length}`);
    client.guilds.forEach((guild) => {
        console.log(`${Format('yy-MM-dd hh:mm',new Date())}: ${guild.name}`);
    })
});

client.login(botSettings.token); // Replace XXXXX with your bot token


client.on('message', async (receivedMessage)=> {

    if(receivedMessage.author.bot) return;
    if(receivedMessage.channel.type === 'dm') return;

    let messageArray = receivedMessage.content.split(/\s+/g);
    let command = messageArray[0];

    if(!command.startsWith(prefix)) return;
    //if(command.startsWith(`${prefix}${prefix}`)) return;

    let args = messageArray.slice(1);
    let cmd = client.commands.get(command.slice(prefix.length));

    if(cmd){
        console.log(`${Format('yy-MM-dd hh:mm',new Date())}: Starting command ${command}`);
        await cmd.run(client, receivedMessage, args, con);
        console.log(`${Format('yy-MM-dd hh:mm',new Date())}: finished command ${command}`);
    }

    /*if (receivedMessage.content.startsWith("!")) {
        processCommand(receivedMessage)
    }*/

});

function processCommand(receivedMessage) {
    /*let fullCommand = receivedMessage.content.substr(1); // Remove the leading exclamation mark
    let splitCommand = fullCommand.split(" "); // Split the message up in to pieces for each space
    let primaryCommand = splitCommand[0]; // The first word directly after the exclamation is the command
    let args = splitCommand.slice(1); // All other words are args/parameters/options for the command

    console.log("Command received: " + primaryCommand);
    console.log("Arguments: " + args); // There may not be any args

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
    }*/
}

async function setupCommand(client, receivedMessage, args, con)
{

}

function test(client, receivedMessage, args, con){
    receivedMessage.guild.channels.forEach((channel) => {
        if(channel.name === args[0]){
            client.channelID = channel.id;
            console.log(client.channelID);
        }
    });
}