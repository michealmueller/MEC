module.exports.run = async (client, receivedMessage, args, con) => {
    const Discord = require('discord.js');
    const Format = require('date-format');
    const mysql = require('mysql');

    let botSettings = require('../botSettings');

    console.log(args[0], args[1]);
    try{
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
    }catch (e) {
        console.log(`${Format('yy-MM-dd hh:mm', new Date())}:`+e);
    }


    if (args.length === 0) {
        receivedMessage.channel.send('!set_timezone {timezone : abbreviation(e.g.EST} {organization_name)');
        receivedMessage.channel.send('just like the !setup command when you enter your organization name, it must be exactly as it is on the event site. with the exception of any spaces need to be replaced by _ (underscores)');
    }else if (args.length === 2) {
        receivedMessage.channel.send('Ok, i will save this for you, so i can convert event times correctly!');

        async function getData()
        {
            let org = args[2].replace('_', ' ');

            return new Promise((resolve, reject) =>{

                let sql = `select id from organizations where org_name = ?`;

                con.query(sql, [org],(err, result) => {
                    if (err){
                        reject(err);
                    } else{
                        if(result.length > 0){
                            resolve(result[0].id);
                        }else{
                            reject(err);
                        }
                    }
                });
            });
        }


        async function saveData(orgID, tz) {

            return new Promise((resolve, reject) => {
                let sql_check = `SELECT id FROM discordbot WHERE organization_id=?`;
                con.query(sql_check, [orgID], (err, result) => {
                    if (err) {
                        reject(err);
                    } else {
                        if (result.length > 0) {
                            let sql = `UPDATE discordbot SET timezone = '${tz}' WHERE organization_id = '${orgID}'`;
                            con.query(sql, (err, result) => {
                                if (err) {
                                    reject(err);
                                } else {
                                    resolve(`${Format('yy-MM-dd hh:mm', new Date())}: Set Timezone for organization '${orgID}' to '${tz}'.`)
                                }
                            });
                        } else {
                            console.log(`${Format('yy-MM-dd hh:mm', new Date())} this organization has not been added! Org name => ${org}`);
                            receivedMessage.channel.send('You need to run !setup first !');
                            reject(err);
                        }
                    }
                });
            }).catch(err => {
                throw new Error(err)
            });
        }

        await getData()
            .then(orgId =>{
                saveData(orgId, args[0]).then(succ =>{
                    con.destroy();
                }).catch(err =>{
                    console.log(`${Format('yy-MM-dd hh:mm',new Date())}: there was an error SAVING the data!, error->`+err)
                });
            })
            .catch( err =>{
                console.log(`${Format('yy-MM-dd hh:mm',new Date())}: there was an error FETCHING the data!, error ->`+ err)
            });
    }

};

module.exports.help = {
    name:'settz',
};