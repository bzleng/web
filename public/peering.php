<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bzleng</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Courier New', monospace;
        }
        .prompt {
            color: #0369a1;
        }
        .sidebar {
            width: 250px;
            min-height: 100vh; /* Full height sidebar */
        }
        .nav-link {
            
            padding: 0.5rem 0;
            display: block;
            text-decoration: none;

        }
    </style>
</head>
<body>

<div class="flex">
<?php include('sidebar.php'); ?>
</div>


    <!-- Main content -->
    <div class="flex-1 p-8">
        <h1 class="text-4xl font-bold text-center my-12 text-sky-500">&gt; peering</h1>
        <div id="main" class="space-y-6">
            Here you can find peering information for <a href="https://www.peeringdb.com/asn/11776" class="text-sky-600 hover:text-sky-800">AS11776</a>.
        </div>
        <div class="p-6">
            <ul class="list-disc list-inside">
                <li><a href="policy.pdf" class="text-sky-600 hover:text-sky-800">Peering Policy</a></li>
            </ul>
        </div>
    </div>
</div>

</body>
</html>
