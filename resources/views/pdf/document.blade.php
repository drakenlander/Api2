<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>{( $title )}</title>
    </head>
    <body class="antialiased">
        <h1>{( $title )}</h1>
        <p style="text-align: right;">Fecha: {{ \Carbon\Carbon::now()->format('d/m/Y') }}
            <br>Hora: {{ \Carbon\Carbon::now()->format('H:i:s') }}</p>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Género</th>
                    <th>Desarrollador</th>
                    <th>Editor</th>
                </tr>
            </thead>
            <tbody>
                @foreach($games as $game)
                <tr>
                    <td>{( $game['id'] )}</td>
                    <td>{( $game['genre'] )}</td>
                    <td>{( $game['developer'] )}</td>
                    <td>{( $game['publisher'] )}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
