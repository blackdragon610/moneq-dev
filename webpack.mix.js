const mix = require('laravel-mix')
const Dotenv = require('dotenv-webpack');
const webpack = require("webpack");

mix.js('resources/ts/app.ts', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .version().sourceMaps()


require('dotenv').config()


//configデータの取得
var configs = new Object()
const fs = require('fs');
files = fs.readdirSync("./config/custom")
for (let key in files){
    let name = files[key].split(".")
    configs[name] = require("./config/custom/" + files[key])

}

mix.webpackConfig({
    resolve: {
        extensions: ['.vue', '.ts']
    },
    module: {
        rules: [
            {
                test: /\.tsx?$/,
                loader: 'ts-loader',
                options: { appendTsSuffixTo: [/\.vue$/] },
                exclude: /node_modules/
            }
        ]
    },
    plugins: [
        new webpack.DefinePlugin({
            env: JSON.stringify({
                APP_DEBUG:process.env.APP_DEBUG,
                APP_NAME:process.env.APP_NAME,
                APP_URL:process.env.APP_URL
            }),
            configs: JSON.stringify(configs)
        })
    ]
})


