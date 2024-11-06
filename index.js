const dc = require('./dc');

(async () => {
    await dc.initialize();
    await dc.login();
    await dc.moveTo('10455414394818601186', '1095911415749029908');
    await dc.textMsg('/fish');
})();