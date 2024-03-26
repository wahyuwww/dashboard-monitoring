<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TicketIT;
use App\Models\TicketSDG;
use App\Models\TicketLegal;
use App\Models\TicketQa;
use Hash;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function ticketChart()
    {

        $month = '03'; // March
        $year = '2024'; // Year

        // Count of overdue tickets for March
        $overdueCount = TicketIT::whereYear('target SLA Date', $year)
            ->whereMonth('target SLA Date', $month)
            ->where('Status SLA', 'Overdue')
            ->count();

        // Count of on-time tickets for March
        $onTimeCount = TicketIT::whereYear('target SLA Date', $year)
            ->whereMonth('target SLA Date', $month)
            ->where('Status SLA', 'On time')
            ->count();

        // Calculate total tickets for March
        $allData = $overdueCount + $onTimeCount;

        // Calculate percentages
        $overduePercentage = $allData > 0 ? ($overdueCount / $allData) * 100 : 0;
        $onTimePercentage = $allData > 0 ? ($onTimeCount / $allData) * 100 : 0;

        // Round percentages
        $overdue = round($overduePercentage);
        $ontime = round($onTimePercentage);

        // Region data for March
        $regionData = TicketIT::select('region', 'Status SLA')
            ->whereYear('target SLA Date', $year)
            ->whereMonth('target SLA Date', $month)
            ->where('Status SLA', '!=', '')
            ->get()
            ->groupBy('region')
            ->map(function ($tickets) {
                $totalTickets = $tickets->count();
                $overdueCount = $tickets->where('Status SLA', 'Overdue')->count();
                $onTimeCount = $tickets->where('Status SLA', 'On time')->count();

                $overduePercentage = ($overdueCount / $totalTickets) * 100;
                $onTimePercentage = ($onTimeCount / $totalTickets) * 100;

                return [
                    'on_time' => round($onTimePercentage),
                    'overdue' => round($overduePercentage)
                ];
            });

        // Ticket data for March
        $dataTicket = TicketIT::whereYear('target SLA Date', $year)
            ->whereMonth('target SLA Date', $month)
            ->get();
        $overdueCount = $dataTicket->count();

        // Request data for March
        $requestData = TicketIT::select('Request Type')
            ->whereYear('target SLA Date', $year)
            ->whereMonth('target SLA Date', $month)
            ->where('Key', '!=', '')
            ->get()
            ->groupBy('Request Type')
            ->map(function ($tickets) {
                $overdueCount = $tickets->count();

                return [
                    'Key' => $overdueCount
                ];
            });




        try {
            $response = [
                'result' => true,
                'message' => 'Successfully retrieved ticket IT details',
                'data' => [
                    'requestType' => $requestData,
                    'region' => $regionData,
                    'name' => [
                        'name' => 'Overdue',
                        'value' => 'On Time',
                    ],
                    'total_tickets' => $allData,
                    'percentage' => [
                        'status_on_time' => $ontime,
                        'status_overdue' => $overdue
                    ],
                    'count' => [
                        'countTime' => $onTimeCount,
                        'countDue' => $overdueCount
                    ]
                ],
                'status' => 'OK'
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json(['result' => false, 'message' => 'Failure'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function ticketSdgChart()
    {
        $month = '03'; // March
        $date = '2024-02-12'; // Date in the format 'YYYY-MM-DD'

        // Total tickets for the month of March
        $totalTickets = TicketSDG::whereMonth('Target SLA In Date', $month)
            ->whereYear('Target SLA In Date', substr($date, 0, 4)) // Extract year from date
            ->count();

        // Overdue and on-time counts
        $overdueCount = TicketSDG::where('Status SLA', 'Overdue')
            ->whereMonth('Target SLA In Date', $month)
            ->whereYear('Target SLA In Date', substr($date, 0, 4)) // Extract year from date
            ->count();

        $onTimeCount = TicketSDG::where('Status SLA', 'On time')
            ->whereMonth('Target SLA In Date', $month)
            ->whereYear('Target SLA In Date', substr($date, 0, 4)) // Extract year from date
            ->count();

        // Calculate percentages
        $allData = $overdueCount + $onTimeCount;
        $overduePercentage = $allData > 0 ? ($overdueCount / $allData) * 100 : 0;
        $onTimePercentage = $allData > 0 ? ($onTimeCount / $allData) * 100 : 0;

        // Round percentages
        $overdue = round($overduePercentage);
        $ontime = round($onTimePercentage);

        // Region data for March
        $regionData = TicketSDG::select('region', 'Status SLA')
            ->where('Status SLA', '!=', '')
            ->whereMonth('Target SLA In Date', $month)
            ->whereYear('Target SLA In Date', substr($date, 0, 4)) // Extract year from date
            ->get()
            ->groupBy('region')
            ->map(function ($tickets) {
                $totalTickets = $tickets->count();
                $overdueCount = $tickets->where('Status SLA', 'Overdue')->count();
                $onTimeCount = $tickets->where('Status SLA', 'On time')->count();

                $overduePercentage = ($overdueCount / $totalTickets) * 100;
                $onTimePercentage = ($onTimeCount / $totalTickets) * 100;

                return [
                    'on_time' => round($onTimePercentage),
                    'overdue' => round($overduePercentage)
                ];
            });

        // Ticket data for March
        $dataTicket = TicketSDG::whereYear('Target SLA In Date', substr($date, 0, 4)) // Extract year from date
            ->whereMonth('Target SLA In Date', $month)
            ->get();
        $overdueCount = $dataTicket->count();

        // Request data for March
        $requestData = TicketSDG::select('Request Type')
            ->where('Key', '!=', '')
            ->whereMonth('Target SLA In Date', $month)
            ->whereYear('Target SLA In Date', substr($date, 0, 4)) // Extract year from date
            ->get()
            ->groupBy('Request Type')
            ->map(function ($tickets) {
                $overdueCount = $tickets->count();

                return [
                    'Key' => $overdueCount
                ];
            });



        try {
            $response = [
                'result' => true,
                'message' => 'Successfully retrieved ticket SDG details',
                'data' => [
                    'requestType' => $requestData,
                    'region' => $regionData,
                    'name' => [
                        'name' => 'Overdue',
                        'value' => 'On Time',
                    ],
                    'total_tickets' => $allData,
                    'percentage' => [
                        'status_on_time' => $ontime,
                        'status_overdue' => $overdue
                    ],
                    'count' => [
                        'countTime' => $onTimeCount,
                        'countDue' => $overdueCount
                    ]
                ],
                'status' => 'OK'
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json(['result' => false, 'message' => 'Failure'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function ticketLegalChart()
    {
        $month = '03'; // March

        // Total tickets for the month of March
        $totalTickets = TicketLegal::whereMonth('target SLA In date', $month)
            ->whereYear('target SLA In date', '2024') // Assuming the year is always 2024
            ->count();

        // Overdue and on-time counts
        $overdueCount = TicketLegal::where('Status SLA', 'Overdue')
            ->whereMonth('target SLA In date', $month)
            ->whereYear('target SLA In date', '2024') // Assuming the year is always 2024
            ->count();

        $onTimeCount = TicketLegal::where('Status SLA', 'On time')
            ->whereMonth('target SLA In date', $month)
            ->whereYear('target SLA In date', '2024') // Assuming the year is always 2024
            ->count();

        // Calculate percentages
        $allData = $overdueCount + $onTimeCount;
        $overduePercentage = $allData > 0 ? ($overdueCount / $allData) * 100 : 0;
        $onTimePercentage = $allData > 0 ? ($onTimeCount / $allData) * 100 : 0;

        // Round percentages
        $overdue = round($overduePercentage);
        $ontime = round($onTimePercentage);

        // Region data for March
        $regionData = TicketLegal::select('REGION', 'Status SLA')
            ->where('Status SLA', '!=', '')
            ->whereMonth('target SLA In date', $month)
            ->whereYear('target SLA In date', '2024') // Assuming the year is always 2024
            ->get()
            ->groupBy('REGION')
            ->map(function ($tickets) {
                $totalTickets = $tickets->count();
                $overdueCount = $tickets->where('Status SLA', 'Overdue')->count();
                $onTimeCount = $tickets->where('Status SLA', 'On time')->count();

                $overduePercentage = ($overdueCount / $totalTickets) * 100;
                $onTimePercentage = ($onTimeCount / $totalTickets) * 100;

                return [
                    'on_time' => round($onTimePercentage),
                    'overdue' => round($overduePercentage)
                ];
            });

        // Ticket data for March
        $dataTicket = TicketLegal::whereYear('target SLA In date', '2024') // Assuming the year is always 2024
            ->whereMonth('target SLA In date', $month)
            ->get();
        $overdueCount = $dataTicket->count();

        // Request data for March
        $requestData = TicketLegal::select('Request Type')
            ->where('Key', '!=', '')
            ->whereMonth('target SLA In date', $month)
            ->whereYear('target SLA In date', '2024') // Assuming the year is always 2024
            ->get()
            ->groupBy('Request Type')
            ->map(function ($tickets) {
                $overdueCount = $tickets->count();

                return [
                    'Key' => $overdueCount
                ];
            });




        try {
            $response = [
                'result' => true,
                'message' => 'Successfully retrieved ticket Legal details',
                'data' => [
                    'requestType' => $requestData,
                    'region' => $regionData,
                    'name' => [
                        'name' => 'Overdue',
                        'value' => 'On Time',
                    ],
                    'total_tickets' => $allData,
                    'percentage' => [
                        'status_on_time' => $ontime,
                        'status_overdue' => $overdue
                    ],
                    'count' => [
                        'countTime' => $onTimeCount,
                        'countDue' => $overdueCount
                    ]
                ],
                'status' => 'OK'
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json(['result' => false, 'message' => 'Failure'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function ticketQaChart()
    {
        $month = '03'; // March

        // Total tickets for the month of March
        $totalTickets = TicketQa::whereMonth('SLA Target', $month)
            ->whereYear('SLA Target', '2024') // Assuming the year is always 2024
            ->count();

        // Overdue and on-time counts
        $overdueCount = TicketQa::where('Status SLA', 'Overdue')
            ->whereMonth('SLA Target', $month)
            ->whereYear('SLA Target', '2024') // Assuming the year is always 2024
            ->count();

        $onTimeCount = TicketQa::where('Status SLA', 'On time')
            ->whereMonth('SLA Target', $month)
            ->whereYear('SLA Target', '2024') // Assuming the year is always 2024
            ->count();

        // Calculate percentages
        $allData = $overdueCount + $onTimeCount;
        $overduePercentage = $allData > 0 ? ($overdueCount / $allData) * 100 : 0;
        $onTimePercentage = $allData > 0 ? ($onTimeCount / $allData) * 100 : 0;

        // Round percentages
        $overdue = round($overduePercentage);
        $ontime = round($onTimePercentage);

        // Region data for March
        $regionData = TicketQa::select('region', 'Status SLA')
            ->where('Status SLA', '!=', '')
            ->whereMonth('SLA Target', $month)
            ->whereYear('SLA Target', '2024') // Assuming the year is always 2024
            ->get()
            ->groupBy('region')
            ->map(function ($tickets) {
                $totalTickets = $tickets->count();
                $overdueCount = $tickets->where('Status SLA', 'Overdue')->count();
                $onTimeCount = $tickets->where('Status SLA', 'On time')->count();

                $overduePercentage = ($overdueCount / $totalTickets) * 100;
                $onTimePercentage = ($onTimeCount / $totalTickets) * 100;

                return [
                    'on_time' => round($onTimePercentage),
                    'overdue' => round($overduePercentage)
                ];
            });

        // Ticket data for March
        $dataTicket = TicketQa::whereYear('SLA Target', '2024') // Assuming the year is always 2024
            ->whereMonth('SLA Target', $month)
            ->get();
        $overdueCount = $dataTicket->count();

        // Request data for March
        $requestData = TicketQa::select('Request Type')
            ->where('Key', '!=', '')
            ->whereMonth('SLA Target', $month)
            ->whereYear('SLA Target', '2024') // Assuming the year is always 2024
            ->get()
            ->groupBy('Request Type')
            ->map(function ($tickets) {
                $overdueCount = $tickets->count();

                return [
                    'Key' => $overdueCount
                ];
            });


        try {
            $response = [
                'result' => true,
                'message' => 'Successfully retrieved ticket QA details',
                'data' => [
                    'requestType' => $requestData,
                    'region' => $regionData,
                    'name' => [
                        'name' => 'Overdue',
                        'value' => 'On Time',
                    ],
                    'total_tickets' => $allData,
                    'percentage' => [
                        'status_on_time' => $ontime,
                        'status_overdue' => $overdue
                    ],
                    'count' => [
                        'countTime' => $onTimeCount,
                        'countDue' => $overdueCount
                    ]
                ],
                'status' => 'OK'
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json(['result' => false, 'message' => 'Failure'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function show()
    {
        $employees = TicketIT::orderBy('nama', 'ASC')->paginate(10);
        return view('dashboard', ['employees' => $employees]);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' =>
            'required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Auth success
            auth()->login($user);

            $employees = TicketIT::all();
            return view('dashboard', ['employees' => $employees]);
        }

        // Auth failed
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}
