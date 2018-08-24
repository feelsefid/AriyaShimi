@extends('layouts.admin')

@section('content')
    <div class="block-header">
        <div class="row">
            {{--<h2>@lang('side_menu.dashboard')</h2>--}}
        </div>
    </div>

    <style>
        .canvasjs-chart-credit{
            display: none !important;
        }
    </style>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-8">
                <div id="chartContainer" style="height: 500px; width: 100%;direction: ltr;margin-bottom: 30px;"></div>
                <?php $color = '{'; ?>
                @foreach($visittors_countries as $row)
                    <?php
                    $color .= $country[$row['name']] . ': "red",';
                    ?>
                @endforeach
                <?php $color .= '}'; ?>

                <?php $count = '{'; ?>
                @foreach($visittors_countries as $row)
                    <?php
                    $count .='"'. $country[$row['name']].'"' . ':'. $row['session'].",";
                    ?>
                @endforeach
                <?php $count .= '}'; ?>
                <script>
                    window.onload = function () {
                        var chart = new CanvasJS.Chart("chartContainer", {
                            animationEnabled: true,
                            //theme: "light2",
                            title:{
                                text: "آمار بازدید کنندگان",
                                fontFamily: 'IRANSans',
                                fontSize: 13,
                                fontWeight: "bold",

                            },
                            theme: "light2",
                            markerBorderColor: "#000",

                            axisX:{
                                valueFormatString:"DD MMM",
                                crosshair: {
                                    enabled: true,
                                    snapToDataPoint: true
                                },
                                labelFontFamily: 'IRANSans',
                                labelFontSize: 13,
                            },
                            axisY:{
                                title: "تعداد بازدید",
                                titleFontFamily: 'IRANSans',
                                titleFontSize: 13,
                                crosshair: {
                                    enabled: true,
                                    snapToDataPoint: true
                                },
                                labelFontSize: 13,
                                labelFontFamily: 'IRANSans',
                            },
                            toolTip:{
                                enabled: false
                            },
                            data: [{
                                type: "line",
                                dataPoints: <?php echo json_encode($visitorCollection, JSON_NUMERIC_CHECK); ?>
                            }]
                        });
                        chart.render();

                    }
                </script>
            </div>

            <div class="col-lg-4">
                <div id="vmap" style="width: 100%; height: 500px;"></div>
                <script type="text/javascript">

                    jQuery(document).ready(function() {

                        var gdpData = {!! $count !!}
                        var max = 0,
                            min = Number.MAX_VALUE,
                            cc,
                            startColor = [255, 89, 89],
                            endColor = [123, 6, 13],
                            colors = {},
                            hex;

                        //find maximum and minimum values
                        for (cc in gdpData) {
                            if (parseFloat(gdpData[cc]) > max) {
                                max = parseFloat(gdpData[cc]);
                            }
                            if (parseFloat(gdpData[cc]) < min) {
                                min = parseFloat(gdpData[cc]);
                            }
                        }

                        //set colors according to values of GDP
                        for (cc in gdpData) {
                            if (gdpData[cc] > 0) {
                                colors[cc] = '#';
                                for (var i = 0; i < 3; i++) {
                                    hex = Math.round(startColor[i]
                                        + (endColor[i]
                                            - startColor[i])
                                        * (gdpData[cc] / (max - min))).toString(16);

                                    if (hex.length == 1) {
                                        hex = '0' + hex;
                                    }

                                    colors[cc] += (hex.length == 1 ? '0' : '') + hex;
                                }
                            }
                        }

                        //initialize JQVMap
                        jQuery('#vmap').vectorMap(
                            {
                                colors: colors,
                                backgroundColor: '#fff',
                                color:'#eee',
                                borderColor: '#000',
                                hoverOpacity: 0.7,
                                hoverColor: false,
                                enableZoom: false
                            });

                    })
                </script>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>@lang('article.latest_news')</h2>
                    </div>
                    <div class="body">
                        <table class="table no-margn">
                            <thead>
                            <tr>
                                <td class="text-left" style="line-height: 30px"><b>@lang('article.title')</b></td>
                                <td class="text-left"><b>@lang('article.category')</b></td>
                                <td class="text-left"><b>@lang('article.date')</b></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($latest_articles as $row)
                                <tr>
                                    <td>{{ $row->name }}</td>
                                    <td>
                                        {{$row->article_categories->name}}
                                    </td>
                                    <td>{{ $row->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>آمار صفحات بازدید شده</h2>
                    </div>
                    <div class="body">
                        <table class="table no-margn">
                            <thead>
                            <tr>
                                <td class="text-left" style="line-height: 30px"><b>آدرس</b></td>
                                <td class="text-left"><b>عنوان صفحه</b></td>
                                <td class="text-left"><b>تعداد دفعات بازدید</b></td></tr>
                            </thead>
                            <tbody>
                            @foreach(json_decode($most_page_visitor) as $row)
                                <tr>
                                    <td>{{ $row->url }}</td>
                                    <td>{{ $row->pageTitle }}</td>
                                    <td>{{ $row->pageViews }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="header">
                        <h2>نحوه آشنایی کاربران با وب سایت</h2>
                    </div>
                    <div class="body">
                        <table class="table no-margn">
                            <thead>
                            <tr>
                                <td class="text-left" style="line-height: 30px"><b>جستجو از طریق</b></td>
                                <td class="text-left"><b>تعداد دفعات</b></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(json_decode($referrers) as $row)
                                <tr>
                                    <td>{{ $row->url }}</td>
                                    <td>{{ $row->pageViews }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="header">
                        <h2>آخرین ورود مدیران</h2>
                    </div>
                    <div class="body">
                        <table class="table no-margn">
                            <thead>
                            <tr>
                                <td class="text-left" style="line-height: 30px"><b>نام</b></td>
                                <td class="text-left"><b>ایمیل</b></td>
                                <td class="text-left"><b>آخرین ورود</b></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lastlogins as $row)
                                <tr>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->lastlogin}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">&nbsp;</div>
            </div>

            <script>
                $('#dashboard').addClass('active');
            </script>

@endsection
