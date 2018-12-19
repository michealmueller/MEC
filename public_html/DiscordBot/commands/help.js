module.exports.run = async (client, receivedMessage, args, con) => {
const Format = require('date-format');
//`${Format('yy-MM-dd hh:mm',new Date())}: `

    if (args.length === 0) {
        receivedMessage.channel.send('So you need some help? no problem!');
        receivedMessage.channel.send('Do you need help with Setup or Testing?');
        receivedMessage.channel.send('For setup help, use the command !help setup, or if you have it all setup and you want to send a test notification use !help test ');
    }else if (args.length > 1) {
        receivedMessage.channel.send('You gave to many parameters!');
    }

    if(args === 'setup'){
        receivedMessage.channel.send('I can get you all setup with a single command.');
        receivedMessage.channel.send('The !setup command takes a max of 3 arguments 2 channels and your org name as it is on the events site.');
        receivedMessage.channel.send('Canalization does not matter, discord text channels can not have spaces so type them as they are, organization names on the other hand can and do have spaces, so replace the space with an _ (underscore)')
        receivedMessage.channel.send('Example: !setup public-events private-events my_org_name');
    }
};
module.exports.help = {
    name: 'help'
};