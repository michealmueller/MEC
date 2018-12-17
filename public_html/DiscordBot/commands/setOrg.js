module.exports.run = (client, receivedMessage, args, con) => {

    if (args.length > 1) {
        receivedMessage.channel.send('Please rerun the command with your organization name as it is on the event site, if your organization name has a space, replace it with an _ (underscore)');
        return;
    }

    let org_named = args[0].replace('_', ' ');

    con.query(`select id from organizations where org_name = '${org_named}'`, (err, rows) => {
        if (err) throw err;
        client.organizationID = rows[0];
        //console.log(client.organizationID);
    });
};
module.exports.help = {
    name: 'set-org',
    usage: "set organization for saving the webhook."
};