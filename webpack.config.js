const path = require('path')
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
    entry: './public/static/scripts/script.js',
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, 'public/static/build')
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /(node_modules)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            },
            {
                test: /\.css$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader
                    },
                    {
                        loader: "css-loader",
                    },
                ]
            },
            {
                test: /\.(jpg|JPG|jpeg|png|gif|mp3|svg|ttf|woff2|woff|eot)$/,
                use: {
                    loader: 'url-loader',
                },
            },
        ],
    },
    plugins: [

        new MiniCssExtractPlugin({
            filename: "bundle.css"
        })
    ]
}