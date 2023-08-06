<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students Performance</title>
    <style>
        table { 
	width: 100%; 
	border-collapse: collapse; 
	margin:5px auto;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #228b22 ; 
	color: white; 
	font-weight: bold; 
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 18px;
	}
    .heading{
        margin:  0 auto;
        text-align: center;
        color: #228b22 ; 
    }


    </style>
</head>
<body>
    <h1 class="heading">Follow For Now Life Skills 101</h1>
    <table>
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>% Correct</th>
            <th>Modules Completed</th>
          </tr>
        </thead>
        <tbody>
     
            <?php $__currentLoopData = $studentRecord; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <tr>
                    <td data-column="#"><?php echo e($student['#']); ?></td>
                    <td data-column="First Name"><?php echo e($student['first_name']); ?></td>
                    <td data-column="Last Name"><?php echo e($student['last_name']); ?></td>
                    <td data-column="% Correct"><?php echo e($student['percentage']); ?></td>
                    <td data-column="Modules Completed"><?php echo e($student['completedModule']); ?></td>
                 </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
      
        </tbody>
      </table>
</body>
</html><?php /**PATH /home/customer/www/zeroguess.us/public_html/n17/FFN/app/resources/views/content/teachers/export/stdent-pdf.blade.php ENDPATH**/ ?>