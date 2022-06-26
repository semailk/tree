<style>
    .container {
        width: 100%;
        height: 100%;
    }
    body {
        background: #198754;
    }

    .container img {
        position: absolute;
        right: 0;
        bottom: 0;
    }
</style>
<div class="container">
    <h1>Certificate CODE={{ $certificate->code }}</h1>
    <h3>For: {{ $certificate->fullName }}</h3>
    <h3>Trees: {{ $certificate->number_of_trees }}</h3>
    <h3>The amount: {{ $certificate->total_price }}</h3>
</div>
