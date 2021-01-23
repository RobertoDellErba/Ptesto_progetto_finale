
@switch($imageValue)

@case('0')


<div class="progress shadow">
    <div class="progress-bar bg-success" role="progressbar" style="width: 0%"></div>
</div>

@break

@case('15')


<div class="progress shadow">
    <div class="progress-bar bg-success" role="progressbar" style="width: 15%"></div>
</div>

@break

@case('30')


<div class="progress shadow">
    <div class="progress-bar bg-success" role="progressbar" style="width: 30%"></div>
</div>

@break

@case('50')


<div class="progress shadow">
    <div class="progress-bar bg-warning" role="progressbar" style="width: 50%"></div>
</div>

@break

@case('75')


<div class="progress shadow">
    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%"></div>
</div>

@break

@case('100')


<div class="progress shadow">
    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%"></div>
</div>

@break
@endswitch