const path = require('path')

module.exports = {
    entry: './public/static/scripts/script.js',
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, './public/static/scripts/build')
    },
    module: {
        rules: [
            {
                test: /\.css$/,
                use: ['style-loader', 'css-loader'],
            },
        ],
    },
}