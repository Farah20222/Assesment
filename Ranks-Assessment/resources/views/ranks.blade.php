<!DOCTYPE html>
<html>
<head>
    <title>Team Ranks</title>
</head>
<body>
    <h1>Team Ranks</h1>
    <table>
        <thead>
            <tr>
                <th>Rank</th>
                <th>Team</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ranks as $rank)
                <tr>
                    <td>{{ $rank['rank'] }}</td>
                    <td>{{ $rank['team'] }}</td>
                    <td>{{ $rank['score'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>