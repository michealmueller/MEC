module.exports.run = async (client, receivedMessage, args) =>{
    //let botSettings = require('../botSettings');
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
};

module.exports.help = {
    name:'setup',
    usage: "start the bot setup process."
};