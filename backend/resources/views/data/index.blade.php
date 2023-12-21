<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-sclae=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Cities</h1>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>NAME</th>
            </tr>
            @foreach($cities as $city)
            <tr>
                <td>{{$city->id}}</td>
                <td>{{$city->name}}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <h1>Services</h1>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>PICTURE_ID</th>
                <th>NAME</th>
            </tr>
            @foreach($services as $service)
                <tr>
                    <td>{{$service->id}}</td>
                    <td>{{$service->picture->path}}</td>
                    <td>{{$service->name}}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <h1>Reviews</h1>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>TEXT</th>
                <th>PICTURE_ID</th>
                <th>NAME</th>
            </tr>
            @foreach($reviews as $review)
                <tr>
                    <td>{{$review->id}}</td>
                    <td>{{$review->text}}</td>
                    <td>{{$review->picture->path}}</td>
                    <td>{{$review->title}}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <h1>Portfolios</h1>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>AREA</th>
                <th>DESCRIPTION</th>
                <th>PRICE</th>
                <th>WHAT_WAS_DONE</th>
                <th>PICTURE0_ID</th>
                <th>PICTURE1_ID</th>
                <th>PICTURE2_ID</th>
                <th>PICTURE3_ID</th>
            </tr>
            @foreach($portfolios as $portfolio)
                <tr>
                    <td>{{$portfolio->id}}</td>
                    <td>{{$portfolio->name}}</td>
                    <td>{{$portfolio->area}}</td>
                    <td>{{$portfolio->description}}</td>
                    <td>{{$portfolio->price}}</td>
                    <td>{{$portfolio->what_was_done}}</td>
                    <td>{{$portfolio->picture0->path}}</td>
                    <td>{{$portfolio->picture1->path}}</td>
                    <td>{{$portfolio->picture2->path}}</td>
                    <td>{{$portfolio->picture3->path}}</td>
                </tr>
            @endforeach
        </table>
    </div>

        <h1>Form</h1>
        <form method="post" action="{{route("data.feedback")}}">
            <div>
                @if($errors->any())
                     <ul>
                        @foreach($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            @csrf
            @method('post')
            <div>
                <label>Name</label>
                <input type="text" name="name" placeholder="Name" />
            </div>
            <div>
                <label>Phone</label>
                <input type="text" name="phone" placeholder="Phone" />
            </div>
            <div>
                <label>Email</label>
                <input type="text" name="mail" placeholder="Email" />
            </div>
            <div>
                <input type="submit" value="Save">
            </div>
        </form>
    </body>
    </html>
