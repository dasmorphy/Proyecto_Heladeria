const databaseService = () => {
    const knex = require('knex')({
        client: 'mysql',
        connection: {
            host: process.env.DB_HOST,
            port: 3306,
            user: process.env.DB_USER,
            password: process.env.DB_PASS,
            database: process.env.DB,
           
        }

    });
    const table = 'producto';

    const crearLenguaje = ({ nombre, descripcion, precio }) => {
        return knex(table).insert({
            nombre: nombre,
            descripcion: descripcion,
            precio: precio,
        }); //retorna una promesa
    };
    return {
        crearLenguaje
    }
};
module.exports = {
    databaseService
};