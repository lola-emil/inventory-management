const knex = require("knex");
const bcrypt = require("bcrypt");


const db = knex({
    client: "mysql",
    connection: {
        host: "localhost",
        port: 3306,
        user: "root",
        database: "inventory_management_db"
    }
});

async function main() {
    const username = "admin2";
    const password = await bcrypt.hash("letmein123", 10); 

    await db.raw(`
        INSERT INTO tbl_admin (firstname, lastname, username, password)
        VALUES ('Si', 'Kuan', '${username}', '${password}')
        `)


        console.log("Added successfully")
}

main();