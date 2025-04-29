function updateTime() {
    let now = new Date();
    let options = { 
        timeZone: 'Asia/Yerevan', 
        hour: '2-digit', 
        minute: '2-digit', 
        second: '2-digit', 
        hour12: false 
    };
    let formatter = new Intl.DateTimeFormat('hy-AM', options);
    let timeString = formatter.format(now);
    document.getElementById('time').innerHTML = timeString;
}
setInterval(updateTime, 1000); 
updateTime();