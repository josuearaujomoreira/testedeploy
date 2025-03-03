const { defineConfig } = require('@vue/cli-service')

module.exports = defineConfig({
  publicPath: process.env.NODE_ENV === 'production' ? process.env.BASE_URL : '/',
  
  // Adicione a configuração do devServer aqui
  devServer: {
    host: '0.0.0.0',  // Isso permite conexões de fora do container
    port: 3000        // A porta que o Vue irá escutar dentro do container
  },

  pluginOptions: {
    i18n: {
      locale: 'en',
      fallbackLocale: 'en',
      localeDir: 'locales',
      enableInSFC: false
    }
  },
  transpileDependencies: true
})
