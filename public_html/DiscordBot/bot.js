const Discord = require('discord.js');
const botSettings = require('./botSettings');
const fs = require('fs');

const client = new Discord.Client({disableEveryone:true});
const mysql = require('mysql');
const prefix = botSettings.prefix;

client.commands = new Discord.Collection();

fs.readdir('./commands/', (err, files) =>{
    if(err) console.error(err);

    let jsfiles = files.filter(f => f.split(".").pop() === 'js');
    if(jsfiles.length <= 0){
        console.log('there are no files!');
        return;
    }

    console.log(`Loading ${jsfiles.length} commands.`);

    jsfiles.forEach((f,i) =>{
       let props = require(`./commands/${f}`);
       console.log(`${i + 1}: ${f} loaded!`);
       client.commands.set(props.help.name, props);
    });
});

let myChannelPublic;
let myChannelPrivate;
let publicWebhookID;
let publicWebhookToken;
let privateWebhookID;
let privateWebhookToken;
let publicWebHook;
let privateWebHook;
let numEventChans;
let organizationID;
let con;


client.on('ready', () => {
    console.log("Connected as " + client.user.tag);

    con = mysql.createConnection({
        host:botSettings.dbhost,
        user:botSettings.dbuser,
        password:botSettings.dbpass,
        database:botSettings.dbdatabase
    });

    con.connect(err => {
        if (err) throw err;
        console.log("Connected to DB");
    });
});

client.login(botSettings.token); // Replace XXXXX with your bot token


client.on('message', (receivedMessage)=> {
    if(receivedMessage.author.bot) return;
    if(receivedMessage.channel.type === 'dm') return;

    let messageArray = receivedMessage.content.split(/\s+/g);
    let command = messageArray[0];
    let args = messageArray.slice(1);

    if(!command.startsWith(prefix)) return;

    if(command === 'set-organization'){
        setOrganization(client, receivedMessage, args);
        return;
    }

    let cmd = client.commands.get(command.slice(prefix.length));
    if(cmd) cmd.run(client, receivedMessage, args, con);
    //console.log('this is bot.js!');
    //console.log(client.organizationID);

});

function testCommand(args, WebhookToken, WebhookID)
{
    console.log(args);
}