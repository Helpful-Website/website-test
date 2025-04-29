<?php
    // Weather Code
    $apiKey = "14acb3dcd931433ea50183600242710";
    $city = "Yerevan";
    $apiUrl = "http://api.weatherapi.com/v1/current.json?key=$apiKey&q=$city&aqi=no";
    
    $weatherData = file_get_contents($apiUrl);
    if ($weatherData === false) {
        echo "<h2>Եղանակի տվյալները բեռնելու ժամանակ սխալ է առաջացել:</h2>";
    } else {
        $weatherArray = json_decode($weatherData, true);
        if (isset($weatherArray['current'])) {
            $temp = $weatherArray['current']['temp_c'];
            $tempSign = $temp >= 0 ? '+' : '';
            $condition = $weatherArray['current']['condition']['text']; 
        
            if (strpos(strtolower($condition), 'sun') !== false) {
                $weatherIcon = 'images/sun.png';
            } elseif (strpos(strtolower($condition), 'sunset') !== false) {
                $weatherIcon = 'images/sunset.png';
            } elseif (strpos(strtolower($condition), 'moon') !== false) {
                $weatherIcon = 'images/clear_night.png';
            } elseif (strpos(strtolower($condition), 'cloudy') !== false) {
                $weatherIcon = 'images/cloudy_weather.png';
            } elseif (strpos(strtolower($condition), 'cloud') !== false) {
                $weatherIcon = 'images/cloud.png';
            } elseif (strpos(strtolower($condition), 'rain') !== false) {
                $weatherIcon = 'images/rain.png';
            } elseif (strpos(strtolower($condition), 'lightning') !== false) {
                $weatherIcon = 'images/lightning.png';
            } elseif (strpos(strtolower($condition), 'snow') !== false) {
                $weatherIcon = 'images/snow.png';
            } elseif (strpos(strtolower($condition), 'haze') !== false) {
                $weatherIcon = 'images/haze.png';
            } elseif (strpos(strtolower($condition), 'fog') !== false) {
                $weatherIcon = 'images/fog.png';
            } elseif (strpos(strtolower($condition), 'drizzling') !== false) {
                $weatherIcon = 'images/drizzling.png';
            } elseif (strpos(strtolower($condition), 'drizzling_night') !== false) {
                $weatherIcon = 'images/drizzling_night.png';
            } elseif (strpos(strtolower($condition), 'partly_cloudy_night') !== false) {
                $weatherIcon = 'images/partly_cloudy_night.png';
            } elseif (strpos(strtolower($condition), 'snowstorm') !== false) {
                $weatherIcon = 'images/snowstorm.png';
            } else {
                $weatherIcon = 'images/wind.png';
            }         
            echo "<div class='header'><div class='weather-container'><img src=$weatherIcon alt='Weather Icon' width='30' height='32'/><p class='temperature'>$tempSign$temp</p><span>&deg;C</span></div></div>";
        } else {
            echo "<h2>Չհաջողվեց բեռնել եղանակի տվյալները:</h2>";
        }
    }


    // Date & Time Code
    date_default_timezone_set('Asia/Yerevan');
    $days = array("Կիրակի", "Երկուշաբթի", "Երեքշաբթի", "Չորեքշաբթի", "Հինգշաբթի", "Ուրբաթ", "Շաբաթ");
    $months = array("", "Հունվարի", "Փետրվարի", "Մարտի", "Ապրիլի", "Մայիսի", "Հունիսի", "Հուլիսի", "Օգոստոսի", "Սեպտեմբերի", "Հոկտեմբերի", "Նոյեմբերի", "Դեկտեմբերի");
    $dayOfWeek = $days[date("w")];
    $day = date("j");
    $month = $months[date("n")];
    $year = date("Y");
    $time = date('H:i:s');
    echo "<div class='date-class'>$day $month, $dayOfWeek</div>";
?>