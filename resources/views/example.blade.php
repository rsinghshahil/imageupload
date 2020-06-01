<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
{{-- <h1>{{ dd($inames)}}</h1> --}}
    <p>Images</p>
    <div>
        <table>
            <thead>
                {{-- <tr>
                    <th>Image</th>
                </tr> --}}
            </thead>
            <tbody>
                @foreach($inames as $key=>$img)
                <tr>
                    <td>{{ $key+1}}</td>
                    <td>
                        <img src={{ public_path('/uploads/'.$img->getFilename())}} alt="no image" width="500" >
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
