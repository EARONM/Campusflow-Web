<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <title>
        CampusFlow Report
    </title>

    <style>

        body {

            font-family: sans-serif;
            padding: 20px;
        }

        h1 {

            margin-bottom: 5px;
        }

        table {

            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {

            border: 1px solid #ccc;
            padding: 10px;
            font-size: 12px;
            text-align: left;
        }

        th {

            background: #f3f4f6;
        }

    </style>

</head>

<body>

    <h1>
        CampusFlow Utility Report
    </h1>

    <p>
        Generated:
        {{ now()->format('F d, Y h:i A') }}
    </p>

    <table>

        <thead>

            <tr>

                <th>Campus</th>
                <th>Building</th>
                <th>Type</th>
                <th>Meter</th>
                <th>Reading</th>
                <th>Date</th>

            </tr>

        </thead>

        <tbody>

            @foreach($readings as $reading)

            <tr>

                <td>
                    {{ $reading->meter?->building?->campus?->name }}
                </td>

                <td>
                    {{ $reading->meter?->building?->name }}
                </td>

                <td>
                    {{ $reading->meter?->resourceType?->name }}
                </td>

                <td>
                    {{ $reading->meter?->meter_code }}
                </td>

                <td>
                    {{ $reading->reading_value }}
                </td>

                <td>
                    {{ $reading->created_at }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</body>
</html>