module.exports.run = async (client, receivedMessage, args, con) => {
const Format = require('date-format');

    if (args.length > 1) {
        receivedMessage.channel.send('Please rerun the command with your organization name as it is on the event site, if your organization name has a space, replace it with an _ (underscore)');
        return;
    }
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
        console.log(console.error);
    }else{
        saved = await saveData(orgId);
    }

    console.log(`${Format('yyyy-MM-dd',new Date())}:${saved}`);
};
module.exports.help = {
    name: 'setorg',
    usage: "set organization for saving the webhook."
};