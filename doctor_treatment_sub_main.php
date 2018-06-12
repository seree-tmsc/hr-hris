<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>    
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <form class="form-inline" role="form" action="admin_p41.php" method="post">
                    <div class="form-group">
                        <label>Show number of Last Record : </label>
                        <select name="NumberOfRecord" class="form-control">
                            <option value=''>-- ALL --</option>
                            <option value='TOP 10'>-- 010 --</option>
                            <option value='TOP 20'>-- 020 --</option>                            
                            <option value='TOP 40'>-- 040 --</option>
                            <option value='TOP 60'>-- 060 --</option>
                            <option value='TOP 100'>-- 100 --</option>                            
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">View</button>                    
                </form>
            </div>
        </div>
    </div>
</body>

</html>