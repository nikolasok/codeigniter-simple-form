<html>
<head>
    <title>Подать заявку</title>
    <link rel="stylesheet" type="text/css" href="<? echo asset_url(); ?>css/style.css">
    <link rel="stylesheet" href="<? echo asset_url(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<? echo asset_url(); ?>css/bootstrap-grid.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script
    <script src="<? echo asset_url(); ?>js/bootstrap.min.js"></script>
    <script src="<? echo asset_url(); ?>js/func.js"></script>
</head>

<body>
<div class="main col-md-8 offset-md-2 col-sd-10 offset-sd-1 ">
    <div id="content">
        <h1 id="form_head">Добавить заявку</h1><br/>
        <a href="<? base_url()?>cities">Добавить город</a>
        <a href="<? base_url()?>/" class="offset-1">Добавить заявку</a>
        <hr>
        <div id="form_input" class="col-md-12">

            <? echo form_open(); ?>
            <div class="form-group row">
                <?
                echo form_label('Город', '', 'class="col-md-2 col-form-label"');
                echo form_dropdown('cities', $cities, '1', 'id="city_id" class="form-control col-md-3 offset-md-1 col-lg-3 offset-lg-1 offset-xl-0"');
                ?>
            </div>

            <div class="form-group row">
                <?
                echo form_label('Улица', '', 'class="col-md-2 col-form-label"');
                echo form_input([
                    'name' => 'street',
                    'class' => 'input_box form-control col-md-3 offset-md-1 col-lg-3 offset-lg-1 offset-xl-0',
                    'placeholder' => 'Улица',
                    'id' => 'street',
                ]);
                ?>
            </div>

            <div class="form-group row">
                <?
                echo form_label('Дом', '', 'class="col-md-2 col-form-label"');
                echo form_input([
                    'name' => 'house',
                    'class' => 'input_box form-control col-md-3 offset-md-1 col-lg-3 offset-lg-1 offset-xl-0',
                    'placeholder' => 'Номер дома',
                    'id' => 'house',
                ]);
                ?>
            </div>

            <div class="form-group row">
                <?
                echo form_label('Квартира', '', 'class="col-md-2 col-form-label"');
                echo form_input([
                    'name' => 'apartment',
                    'class' => 'input_box form-control col-md-3 offset-md-1 col-lg-3 offset-lg-1 offset-xl-0',
                    'placeholder' => 'Номер квартиры',
                    'id' => 'apartment',
                ]);
                echo "<br>";
                ?>
            </div>

            <? echo form_submit('submit', 'Отправить', "class='submit btn btn-primary col-md-3 offset-md-3 col-lg-3 offset-lg-3 col-xl-2 offset-xl-3'"); ?>

        </div>
        <? echo form_close(); ?>
        <div id="success" class="alert alert-success col-md-6 col-lg-6 col-xl-5"></div>
        <div id="errors" class="alert alert-danger col-md-6 col-lg-6 col-xl-5"></div>

    </div>
</div>
</body>
</html>