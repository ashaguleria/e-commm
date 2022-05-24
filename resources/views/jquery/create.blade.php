<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <input type="button" class="btn-btn-success" value="click" onclick="btn()"><br><br>
    <!-- Window object method -->
    <script type="text/javascript">
    function btn() {
        alert("Hello Alert Box");
    }
    </script>
    <input type="button" value="confirm" onclick="confirm()"><br><Br>
    <script>
    function confirm() {
        var v = confirm(are u sure);
        if (v == true) {
            alert("Ok");
        } else
            alert("cancle");
    }
    </script>

    <!-- objects -->

    <script>
    emp = {
        id: 1,
        name: "abcr",
        salary:
    }
    document.write(emp.id + " " + emp.name + " " + emp.salary);
    </script>

    <br><BR>
    <script>
    var data = 100;

    function a() {
        document.writeln(data);
    }

    function b() {
        document.writeln(data);
    }
    a();
    b();
    </script>
</body>

</html>