<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title>ตัวอย่างปฎิทินภาษาไทย</title>    
    
    <script type="text/javascript" src="../vendors/jquery-3.2.1/jquery-3.2.1.js"></script>
    
    <script type="text/javascript" src="../vendors/jquery.calendars.package-2.1.0/js/jquery.calendars.js"></script>
    <script type="text/javascript" src="../vendors/jquery.calendars.package-2.1.0/js/jquery.calendars.plus.js"></script>
    <link type="text/css" href="../vendors/jquery.calendars.package-2.1.0/css/humanity.calendars.picker.css" rel="stylesheet"/>
    <script type="text/javascript" src="../vendors/jquery.calendars.package-2.1.0/js/jquery.plugin.js"></script>
    <script type="text/javascript" src="../vendors/jquery.calendars.package-2.1.0/js/jquery.calendars.picker.min.js"></script>
    <script type="text/javascript" src="../vendors/jquery.calendars.package-2.1.0/js/jquery.calendars.picker-th.js"></script>
    <script type="text/javascript" src="../vendors/jquery.calendars.package-2.1.0/js/jquery.calendars.thai.js"></script>    

    <script type="text/javascript">
        $(function() {
            $('#mydate').calendarsPicker({calendar: $.calendars.instance('thai','th')});
        });
    </script>
</head>
<body>
    <h1>ตัวอย่างปฎิทินภาษาไทย</h1>
    <p>วันที่: <input type="text" id="mydate" size="40" readonly></p>
</body>
</html>