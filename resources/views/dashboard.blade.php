<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket List</title>
</head>

<body id="page-top">

    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">

                            <div class="input-group-append">
                                <h4 style="color: #70BBFF; font-weight: bold;">Weekly Monitoring MTD
                                    {{ now()->format('F') }}</h4>

                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>

                                <h6 style="color: black;">Cut Off {{ now()->format('d/m/Y H:i:m') }}</h6>
                            </a>

                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle"href="http://127.0.0.1:8000/" id="userDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">Logout</span> --}}
                                {{-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> --}}
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('login') }}" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>

                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <div class="container-fluid bg-light">

                    <div class="row">

                        <div class="col-sm-3 ml-md-0 ml-sm-1">
                            <div class="card shadow mb-4" style="height: 100;">
                                <div
                                    class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">SLA Ticket IT</h6>
                                </div>
                                <div class="card-body" style="height: 300px; position: relative;">
                                    <div id="slaIt"
                                        style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;"></div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 ml-md-0 ml-sm-1">
                            <div class="card shadow mb-4" style="height: 100;">
                                <div
                                    class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">SLA MnR</h6>
                                </div>
                                <div class="card-body" style="height: 300px; position: relative;">
                                    <div id="slaSdgEx"
                                        style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;"></div>


                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 ml-md-0 ml-sm-1">
                            <div class="card shadow mb-4" style="height: 100;">
                                <div
                                    class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">SLA Legal</h6>
                                </div>
                                <div class="card-body" style="height: 300px; position: relative;">

                                    <div id="slaLegal"
                                        style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 ml-md-0 ml-sm-1">
                            <div class="card shadow mb-4" style="width: 100%;">
                                <div
                                    class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">SLA QA</h6>
                                </div>
                                <div class="card-body" style="height: 300px; position: relative;">
                                    <div id="slaQa"
                                        style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Region by Key  -->
                    <div class="row">
                        <div class="col-sm-3 ml-md-0 ml-sm-1">
                            <div class="card shadow mb-4" style="width: 100%;">
                                <div
                                    class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Region by Key Ticket IT</h6>
                                </div>
                                <div class="card-body" style="height: 300px; position: relative;">
                                    <div id="region-it"
                                        style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;"></div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 ml-md-0 ml-sm-1">
                            <div class="card shadow mb-4" style="width: 100%;">
                                <div
                                    class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Region by Key MnR</h6>
                                </div>
                                <div class="card-body" style="height: 300px; position: relative;">
                                    <div id="region-sdg"
                                        style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;"></div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 ml-md-0 ml-sm-1">
                            <div class="card shadow mb-4" style="width: 100%;">
                                <div
                                    class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Region by Key Legal</h6>
                                </div>
                                <div class="card-body" style="height: 300px; position: relative;">
                                    <div id="region-legal"
                                        style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;"></div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 ml-md-0 ml-sm-1">
                            <div class="card shadow mb-4" style="width: 100%;">
                                <div
                                    class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Region by Key QA</h6>
                                </div>
                                <div class="card-body" style="height: 300px; position: relative;">
                                    <div id="region-qa"
                                        style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 ml-md-0 ml-sm-1 ">
                            <div class="card shadow mb-4" style="width: 100%;">
                                <div
                                    class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Request Type Ticket IT</h6>
                                </div>
                                <div class="card-body" style="height: 300px; position: relative;">
                                    <div id="requestType-it"
                                        style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;"></div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 ml-md-0 ml-sm-1">
                            <div class="card shadow mb-4" style="width: 100%;">
                                <div
                                    class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Request Type MnR</h6>
                                </div>
                                <div class="card-body" style="height: 300px; position: relative;">
                                    <div id="requestType-sdg"
                                        style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;"></div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 ml-md-0 ml-sm-1">
                            <div class="card shadow mb-4"style="width: 100%;">
                                <div
                                    class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Request Type Legal</h6>
                                </div>
                                <div class="card-body" style="height: 300px; position: relative;">
                                    <div id="requestType-legal"
                                        style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;"></div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 ml-md-0 ml-sm-1">
                            <div class="card shadow mb-4" style="width: 100%;">
                                <div
                                    class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Request Type QA</h6>
                                </div>
                                <div class="card-body" style="height: 300px; position: relative;">
                                    <div id="requestType-qa"
                                        style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;Gacoan 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



</body>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    fetch("/api/monitoring/ticket-sdg")
        .then(response => response.json())
        .then(items => {
            const data = items?.data;

            // Calculate the total for both 'Overdue' and 'On Time'
            const total = (data?.percentage?.status_overdue || 0) + (data?.percentage?.status_on_time || 0);

            // Calculate the percentage for 'Overdue' and 'On Time'
            const overduePercentage = total > 0 ? (data?.percentage?.status_overdue / total) * 100 : 0;
            const onTimePercentage = total > 0 ? (data?.percentage?.status_on_time / total) * 100 : 0;

            // Round the percentages to whole numbers (units)
            const roundedOverduePercentage = Math.round(overduePercentage);
            const roundedOnTimePercentage = Math.round(onTimePercentage);

            const seriesData = [{
                    name: 'Overdue',
                    data: [roundedOverduePercentage],
                    color: 'rgba(255, 99, 132, 0.8)',
                    borderColor: 'rgba(255, 99, 132, 0.8)'
                },
                {
                    name: 'On Time',
                    data: [roundedOnTimePercentage],
                    color: 'rgba(54, 162, 235, 0.8)',
                    borderColor: 'rgba(54, 162, 235, 0.8)'
                }
            ];

            Highcharts.chart('slaSdgEx', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: ['']
                },
                yAxis: {
                    title: {
                        text: '' // Update the y-axis title
                    },
                    labels: {
                        format: '{value}%' // Display percentages in the y-axis labels
                    }
                },
                series: seriesData,
                plotOptions: {
                    series: {
                        dataLabels: {
                            enabled: true,
                            color: 'black',
                            align: 'end',
                            formatter: function() {
                                return this.y + '%'; // Display rounded percentages with '%' symbol
                            }
                        }
                    }
                }
            });

        });

    fetch("/api/monitoring/ticket-sdg")
        .then(response => response.json())
        .then(items => {
            const data = items?.data;
            const labels = Object.keys(data?.region)
                .filter(label => typeof label === 'string' && label.trim() !== '');
            const overdueData = labels.map(label => data?.region[label].overdue);
            const onTimeData = labels.map(label => data?.region[label].on_time);

            // Calculate total counts for each category
            const totalData = labels.map((label, index) => overdueData[index] + onTimeData[index]);

            // Construct series data for Highcharts
            const seriesData = [{
                name: 'Overdue',
                data: overdueData.map((value, index) => value / totalData[index] * 100),
                color: 'rgba(255, 99, 132, 0.8)',
                borderColor: 'rgb(255, 99, 132)',
            }, {
                name: 'On Time',
                data: onTimeData.map((value, index) => value / totalData[index] * 100),
                color: 'rgba(54, 162, 235, 0.8)',
                borderColor: 'rgb(54, 162, 235)',
            }];

            // Create Highcharts chart
            Highcharts.chart('region-sdg', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: labels
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    stackLabels: {
                        enabled: true,
                        formatter: function() {
                            return Highcharts.numberFormat(this.total,
                                0);
                        }
                    },
                    min: 0,
                    labels: {
                        formatter: function() {
                            return this.value === 100 ? '' : this.value + '%';
                        }
                    }
                },
                plotOptions: {
                    bar: {
                        stacking: 'percent',
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}%',
                            style: {
                                textOutline: false
                            }
                        }
                    }
                },
                series: seriesData
            });

        });

    fetch("/api/monitoring/ticket-sdg")
        .then(response => response.json())
        .then(items => {
            const data = items?.data;
            const namesdg = Object.keys(data?.requestType || {})
                .filter(label => typeof label === 'string' && label.trim() !== '')
                .map(label => label.length > 10 ? label.substring(0, 11) + '...' : label);
            const labelKey = Object.keys(data?.requestType)
                .filter(label => typeof label === 'string' && label.trim() !== '');
            const onKey = labelKey.map(label => data?.requestType[label].Key);

            const seriesData = onKey.map((value, index) => ({
                name: namesdg[index],
                y: value,
            }));
            seriesData.sort((a, b) => a.y - b.y);

            Highcharts.chart('requestType-sdg', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: namesdg,
                    title: {
                        text: ''
                    },
                    labels: {
                        rotation: -45,
                        align: 'right',
                        style: {
                            fontSize: '12px',
                            whiteSpace: 'nowrap'
                        }
                    }
                },
                yAxis: {
                    title: {
                        text: ''
                    }
                },
                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}',
                            style: {
                                color: 'black'
                            }
                        }
                    }
                },
                series: [{
                    name: 'Number of Keys',
                    data: seriesData,
                    color: 'rgba(54, 162, 235, 0.8)'
                }]
            });
        });
</script>

<script>
    fetch("/api/monitoring/ticket-legal")
        .then(response => response.json())
        .then(items => {
            const data = items?.data;

            // Calculate the total for both 'Overdue' and 'On Time'
            const total = (data?.percentage?.status_overdue || 0) + (data?.percentage?.status_on_time || 0);

            // Calculate the percentage for 'Overdue' and 'On Time'
            const overduePercentage = total > 0 ? (data?.percentage?.status_overdue / total) * 100 : 0;
            const onTimePercentage = total > 0 ? (data?.percentage?.status_on_time / total) * 100 : 0;

            // Round the percentages to whole numbers (units)
            const roundedOverduePercentage = Math.round(overduePercentage);
            const roundedOnTimePercentage = Math.round(onTimePercentage);

            const seriesData = [{
                    name: 'Overdue',
                    data: [roundedOverduePercentage],
                    color: 'rgba(255, 99, 132, 0.8)',
                    borderColor: 'rgba(255, 99, 132, 0.8)'
                },
                {
                    name: 'On Time',
                    data: [roundedOnTimePercentage],
                    color: 'rgba(54, 162, 235, 0.8)',
                    borderColor: 'rgba(54, 162, 235, 0.8)'
                }
            ];

            Highcharts.chart('slaLegal', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: ['']
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    labels: {
                        format: '{value}%'
                    }
                },
                series: seriesData,
                plotOptions: {
                    series: {
                        dataLabels: {
                            enabled: true,
                            color: 'black',
                            align: 'end',
                            formatter: function() {
                                return this.y + '%';
                            }
                        }
                    }
                }
            });
        });

    fetch("/api/monitoring/ticket-legal")
        .then(response => response.json())
        .then(items => {
            const data = items?.data;
            const labels = Object.keys(data?.region)
                .filter(label => typeof label === 'string' && label.trim() !== '');
            const overdueData = labels.map(label => data?.region[label].overdue);
            const onTimeData = labels.map(label => data?.region[label].on_time);

            // Calculate total counts for each category
            const totalData = labels.map((label, index) => overdueData[index] + onTimeData[index]);

            // Construct series data for Highcharts
            const seriesData = [{
                name: 'Overdue',
                data: overdueData.map((value, index) => value / totalData[index] * 100),
                color: 'rgba(255, 99, 132, 0.8)',
                borderColor: 'rgb(255, 99, 132)',
            }, {
                name: 'On Time',
                data: onTimeData.map((value, index) => value / totalData[index] * 100),
                color: 'rgba(54, 162, 235, 0.8)',
                borderColor: 'rgb(54, 162, 235)',
            }];

            Highcharts.chart('region-legal', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: labels
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    stackLabels: {
                        enabled: true,
                        formatter: function() {
                            return Highcharts.numberFormat(this.total,
                                0);
                        }
                    },
                    min: 0,
                    labels: {
                        formatter: function() {
                            return this.value === 100 ? '' : this.value + '%';
                        }
                    }
                },
                plotOptions: {
                    bar: {
                        stacking: 'percent',
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}%',
                            style: {
                                textOutline: false
                            }
                        }
                    }
                },
                series: seriesData
            });


        });

    fetch("/api/monitoring/ticket-legal")
        .then(response => response.json())
        .then(items => {
            const data = items?.data;
            const namesdg = Object.keys(data?.requestType || {})
                .filter(label => typeof label === 'string' && label.trim() !== '')
                .map(label => label.length > 10 ? label.substring(0, 11) + '...' : label);
            const labelKey = Object.keys(data?.requestType)
                .filter(label => typeof label === 'string' && label.trim() !== '');
            const onKey = labelKey.map(label => data?.requestType[label].Key);

            // Construct series data for Highcharts
            const seriesData = onKey.map((value, index) => ({
                name: namesdg[index],
                y: value,
            }));
            seriesData.sort((a, b) => a.y - b.y);

            Highcharts.chart('requestType-legal', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: namesdg,
                    title: {
                        text: ''
                    },
                    labels: {
                        rotation: -45,
                        align: 'right',
                        style: {
                            fontSize: '12px',
                            whiteSpace: 'nowrap'
                        }
                    }
                },
                yAxis: {
                    title: {
                        text: ''
                    }
                },
                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}',
                            style: {
                                color: 'black'
                            }
                        }
                    }
                },
                series: [{
                    name: 'Number of Keys',
                    data: seriesData,
                    color: 'rgba(54, 162, 235, 0.8)'
                }]
            });
        });
</script>

<script>
    fetch("/api/monitoring/ticketIt")
        .then(response => response.json())
        .then(items => {
            // SLA SDG
            const data = items?.data;

            // Calculate the total for both 'Overdue' and 'On Time'
            const total = (data?.percentage?.status_overdue || 0) + (data?.percentage?.status_on_time || 0);

            // Calculate the percentage for 'Overdue' and 'On Time'
            const overduePercentage = total > 0 ? (data?.percentage?.status_overdue / total) * 100 : 0;
            const onTimePercentage = total > 0 ? (data?.percentage?.status_on_time / total) * 100 : 0;

            // Round the percentages to whole numbers (units)
            const roundedOverduePercentage = Math.round(overduePercentage);
            const roundedOnTimePercentage = Math.round(onTimePercentage);

            const seriesData = [{
                    name: 'Overdue',
                    data: [roundedOverduePercentage],
                    color: 'rgba(255, 99, 132, 0.8)',
                    borderColor: 'rgba(255, 99, 132, 0.8)'
                },
                {
                    name: 'On Time',
                    data: [roundedOnTimePercentage],
                    color: 'rgba(54, 162, 235, 0.8)',
                    borderColor: 'rgba(54, 162, 235, 0.8)'
                }
            ];

            Highcharts.chart('slaIt', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: ['']
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    labels: {
                        format: '{value}%'
                    }
                },
                series: seriesData,
                plotOptions: {
                    series: {
                        dataLabels: {
                            enabled: true,
                            color: 'black',
                            align: 'end',
                            formatter: function() {
                                return this.y + '%';
                            }
                        }
                    }
                }
            });
        });

    fetch("/api/monitoring/ticketIt")
        .then(response => response.json())
        .then(items => {
            const data = items?.data;
            const labels = Object.keys(data?.region)
                .filter(label => typeof label === 'string' && label.trim() !== '');
            const overdueData = labels.map(label => data?.region[label].overdue);
            const onTimeData = labels.map(label => data?.region[label].on_time);

            // Calculate total counts for each category
            const totalData = labels.map((label, index) => overdueData[index] + onTimeData[index]);

            // Construct series data for Highcharts
            const seriesData = [{
                name: 'Overdue',
                data: overdueData.map((value, index) => value / totalData[index] * 100),
                color: 'rgba(255, 99, 132, 0.8)',
                borderColor: 'rgb(255, 99, 132)',
            }, {
                name: 'On Time',
                data: onTimeData.map((value, index) => value / totalData[index] * 100),
                color: 'rgba(54, 162, 235, 0.8)',
                borderColor: 'rgb(54, 162, 235)',
            }];


            Highcharts.chart('region-it', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: labels
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    stackLabels: {
                        enabled: true,
                        formatter: function() {
                            return Highcharts.numberFormat(this.total,
                                0);
                        }
                    },
                    min: 0,
                    labels: {
                        formatter: function() {
                            return this.value === 100 ? '' : this.value + '%';
                        }
                    }
                },
                plotOptions: {
                    bar: {
                        stacking: 'percent',
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}%',
                            style: {
                                textOutline: false
                            }
                        }
                    }
                },
                series: seriesData
            });

        });

    fetch("/api/monitoring/ticketIt")
        .then(response => response.json())
        .then(items => {
            const data = items?.data;
            const namesdg = Object.keys(data?.requestType || {})
                .filter(label => typeof label === 'string' && label.trim() !== '')
                .map(label => label.length > 10 ? label.substring(0, 11) + '...' : label);
            const labelKey = Object.keys(data?.requestType)
                .filter(label => typeof label === 'string' && label.trim() !== '');
            const onKey = labelKey.map(label => data?.requestType[label].Key);

            // Construct series data for Highcharts
            const seriesData = onKey.map((value, index) => ({
                name: namesdg[index],
                y: value,
            }));
            // Sort seriesData based on the y value
            seriesData.sort((a, b) => a.y - b.y);

            Highcharts.chart('requestType-it', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: namesdg,
                    title: {
                        text: ''
                    },
                    labels: {
                        rotation: -45,
                        align: 'right',
                        style: {
                            fontSize: '12px',
                            whiteSpace: 'nowrap'
                        }
                    }
                },
                yAxis: {
                    title: {
                        text: ''
                    }
                },
                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}',
                            style: {
                                color: 'black'
                            }
                        }
                    }
                },
                series: [{
                    name: 'Number of Keys',
                    data: seriesData,
                    color: 'rgba(54, 162, 235, 0.8)'
                }]
            });
        });
</script>

<script>
    fetch("/api/monitoring/ticket-qa")
        .then(response => response.json())
        .then(items => {
            const data = items?.data;

            // Calculate the total for both 'Overdue' and 'On Time'
            const total = (data?.percentage?.status_overdue || 0) + (data?.percentage?.status_on_time || 0);

            // Calculate the percentage for 'Overdue' and 'On Time'
            const overduePercentage = total > 0 ? (data?.percentage?.status_overdue / total) * 100 : 0;
            const onTimePercentage = total > 0 ? (data?.percentage?.status_on_time / total) * 100 : 0;

            // Round the percentages to whole numbers (units)
            const roundedOverduePercentage = Math.round(overduePercentage);
            const roundedOnTimePercentage = Math.round(onTimePercentage);

            const seriesData = [{
                    name: 'Overdue',
                    data: [roundedOverduePercentage],
                    color: 'rgba(255, 99, 132, 0.8)',
                    borderColor: 'rgba(255, 99, 132, 0.8)'
                },
                {
                    name: 'On Time',
                    data: [roundedOnTimePercentage],
                    color: 'rgba(54, 162, 235, 0.8)',
                    borderColor: 'rgba(54, 162, 235, 0.8)'
                }
            ];

            Highcharts.chart('slaQa', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: ['']
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    labels: {
                        format: '{value}%'
                    }
                },
                series: seriesData,
                plotOptions: {
                    series: {
                        dataLabels: {
                            enabled: true,
                            color: 'black',
                            align: 'end',
                            formatter: function() {
                                return this.y + '%';
                            }
                        }
                    }
                }
            });
        });

    fetch("/api/monitoring/ticket-qa")
        .then(response => response.json())
        .then(items => {
            const data = items?.data;
            const labels = Object.keys(data?.region)
                .filter(label => typeof label === 'string' && label.trim() !== '');
            const overdueData = labels.map(label => data?.region[label].overdue);
            const onTimeData = labels.map(label => data?.region[label].on_time);

            // Calculate total counts for each category
            const totalData = labels.map((label, index) => overdueData[index] + onTimeData[index]);

            // Construct series data for Highcharts
            const seriesData = [{
                name: 'Overdue',
                data: overdueData.map((value, index) => value / totalData[index] * 100),
                color: 'rgba(255, 99, 132, 0.8)',
                borderColor: 'rgb(255, 99, 132)',
            }, {
                name: 'On Time',
                data: onTimeData.map((value, index) => value / totalData[index] * 100),
                color: 'rgba(54, 162, 235, 0.8)',
                borderColor: 'rgb(54, 162, 235)',
            }];


            Highcharts.chart('region-qa', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: labels
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    stackLabels: {
                        enabled: true,
                        formatter: function() {
                            return Highcharts.numberFormat(this.total,
                                0);
                        }
                    },
                    min: 0,
                    labels: {
                        formatter: function() {
                            return this.value === 100 ? '' : this.value + '%';
                        }
                    }
                },
                plotOptions: {
                    bar: {
                        stacking: 'percent',
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}%',
                            style: {
                                textOutline: false
                            }
                        }
                    }
                },
                series: seriesData
            });
        });

    fetch("/api/monitoring/ticket-qa")
        .then(response => response.json())
        .then(items => {
            const data = items?.data;
            const namesdg = Object.keys(data?.requestType || {})
                .filter(label => typeof label === 'string' && label.trim() !== '')
                .map(label => label.length > 10 ? label.substring(0, 11) + '...' : label);
            const labelKey = Object.keys(data?.requestType)
                .filter(label => typeof label === 'string' && label.trim() !== '');
            const onKey = labelKey.map(label => data?.requestType[label].Key);

            // Construct series data for Highcharts
            let seriesData = onKey.map((value, index) => ({
                name: namesdg[index],
                y: value,
            }));

            seriesData.sort((a, b) => a.y - b.y);

            Highcharts.chart('requestType-qa', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: seriesData.map(item => item.name),
                    title: {
                        text: ''
                    },
                    labels: {
                        rotation: -45,
                        align: 'right',
                        style: {
                            fontSize: '12px',
                            whiteSpace: 'nowrap'
                        }
                    }
                },
                yAxis: {
                    title: {
                        text: ''
                    }
                },

                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}',
                            style: {
                                color: 'black'
                            }
                        }
                    }
                },
                series: [{
                    name: 'Number of Keys',
                    data: seriesData,
                    color: 'rgba(54, 162, 235, 0.8)'
                }]
            });
        });
</script>

</html>
