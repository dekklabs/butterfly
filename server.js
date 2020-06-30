const path              = require("path")
const webpackDevServer  = require("webpack-dev-server")
const webpack           = require("webpack")
const fs                = require("fs")

const URL = "https://noticias.dev"

const HOST = "noticias.dev"

const config = require("./webpack.config.dev")
const options = {
    contentBase : path.resolve(__dirname, 'dist'),
    publicPath: URL + ':5001/',
    hot: true,
    host: HOST,
    port: 5001,
    allowedHosts: [
        'localhost',
        HOST
    ],
    https: {
        key: fs.readFileSync('../../../../../etc/ssl/laragon.key'),
        cert: fs.readFileSync('../../../../../etc/ssl/laragon.crt'),
        ca: fs.readFileSync('../../../../../etc/ssl/cacert.pem'),
    },
    headers: {
        'Access-Control-Allow-Origin': '*',
        'Access-Control-Allow-Methods': 'GET,OPTIONS,HEAD,PUT,POST,DELETE,PATCH',
        'Access-Control-Allow-Headers': 'Origin, Content-Type, Accept, Authorization, X-Request-With',
        'Access-Control-Allow-Credentials': 'true',
    }
};

webpackDevServer.addDevServerEntrypoints(config, options)
const compiler = webpack(config)
const server = new webpackDevServer(compiler, options)

server.listen(5001, HOST, () => {
    console.log('Dev server listening on port 5001')
})