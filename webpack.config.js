const path = require('path');
const webpack = require('webpack');
const VueLoaderPlugin = require('vue-loader/lib/plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
    
    mode: 'development',
    watch: true,
    entry: './assets/main.js',
    output: {
        path: path.resolve(__dirname, 'public'),
        filename: 'app.js'
    },
    // MODULE
    module: {
        rules: [
            // BABEL
            {
                test: /\.m?js$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env'],
                        plugins: ['@babel/plugin-transform-runtime']
                    }
                }
            },
            // STYLE
            {
                test: /\.(sa|sc|c)ss$/,
                use:
                    [
                        MiniCssExtractPlugin.loader,
                        "css-loader",
                        "sass-loader",
                    ]
            },
            // VUE : for more info https://vue-loader.vuejs.org/#what-is-vue-loader
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            }
        ],

    },
    // PLUGINS
    plugins: [
        new MiniCssExtractPlugin({
            filename: "app.css"
        }),
        new webpack.ProvidePlugin({
            'Promise': 'bluebird'
        }),
        new VueLoaderPlugin(),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery'
        })

    ],
    // OPTIMIZATION
    optimization: {

    },

};
