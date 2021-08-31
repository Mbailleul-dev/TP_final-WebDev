let choice1 = document.getElementById('etfChoice1');

choice1.addEventListener('select', function() {
    let etf1 = document.getElementById('etfChoice1').value;
})

$(function() {

    $.get({
        url: 'http://api.marketstack.com/v1/Tickers/EDV/eod',
        data: {
            access_key: '1264cdd4f7dcfa790d7b2f226608330b'
        },
        dataType: 'json',
        success: function(apiResponse) {
            console.log(apiResponse);
            if (Array.isArray(apiResponse['data'])) {
                apiResponse['data'].forEach(stockData => {
                    console.log(`Ticker ${stockData['symbol']}`,
                        `has a day high of ${stockData['high']}`,
                        `on ${stockData['date']}`);
                });
            }
        }
    });

})