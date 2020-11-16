console.log("WW")

const path = require('path');
const Dotenv = require('dotenv-webpack');

webpack = require('webpack');



module.exports = {
    mode: "development",
    resolve: {
        extensions: ['.vue', '.ts']
    },
    entry: './resources/ts/app.ts',
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

    /*plugins: [
        new Dotenv({ systemvars: true })
    ],
    node: {
        fs: false
    },
    browser: {
        fs: false
    }
    /*
    plugins : [
        new webpack.DefinePlugin({
            DOMAIM: "TEST",
        })
    ],*/

}
