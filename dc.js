const puppeteer = require('puppeteer');

const BASE_URL = 'https://discord.com';

const discord = {
    browser:null,
    page:null,

    initialize:async() => {
        discord.browser = await puppeteer.launch({ headless: false });
        discord.page = await discord.browser.newPage();

        await discord.page.goto(BASE_URL);
    },

    login:async() => {
        let loginButton = await discord.page.waitForXPath('//a[contains(text(),"Login")]');
        await loginButton.click();
        await discord.page.waitForNavigation();
        await discord.page.waitForTimeout(1000);

        await discord.page.type('input[name="email"]', 'deviyuni866@gmail.com', {delay:50});
        await discord.page.type('input[name="password"]', 'devi1655', {delay:50});

        loginButton = await discord.page.$x('//div[contains(text(),"Log in")]');
        await loginButton[0].click();
        await discord.page.waitForNavigation();
        await discord.page.waitForTimeout(5000);
    },
    moveTo:async(serverID, channelID) => {
        await discord.page.goto('https://discord.com/channles/+serverID/+channelID');
        await loginButton[0].click();
        await discord.page.waitForNavigation();
        await discord.page.waitForTimeout(5000);
    },
    textMsg:async(txt) => {
        await discord.page.type('div[data-slate-node="element"]', txt, {delay:50});
        await discord.page.waitForTimeout(3000);
        await discord.page.keyboard.press('Enter');
        await discord.page.waitForTimeout(3000);
        await discord.page.keyboard.press('Enter');

    }


} 

module.exports = discord;