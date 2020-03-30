# API List

<table>
    <!-- Title --> 
    <tr>
        <th>Section</th>
        <th>Authentication</th>
        <th>Request Type</th>
        <th>Request URL </th>
        <th>Perameters </th>
    </tr>
    <!-- User --> 
    <tr>
        <td rowspan="3">User</td>
        <td>No</td>
        <td>POST</td>
        <td>/register</td>
        <td>username , email , password</td>
    </tr>
    <tr>
        <td>No</td>
        <td>POST</td>
        <td>/login</td>
        <td>email , password</td>
    </tr>
    <tr>
        <td>No</td>
        <td>POST</td>
        <td>/logout</td>
        <td>api_token</td>
    </tr>
    <!-- Board --> 
    <tr>
        <td rowspan="5">Boards</td>
        <td>Yes</td>
        <td>GET</td>
        <td>/boards</td>
        <td></td>
    </tr>
    <tr>
        <td>Yes</td>
        <td>GET</td>
        <td>/boards/{board}</td>
        <td>'board' => board id</td>
    </tr>
    <tr>
        <td>Yes</td>
        <td>POST</td>
        <td>/boards</td>
        <td>'name' => board name</td>
    </tr>
    <tr>
        <td>Yes</td>
        <td>PUT</td>
        <td>/boards/{board}</td>
        <td>'board' => board id , 'name' => updated board name</td>
    </tr>
    <tr>
        <td>Yes</td>
        <td>DELETE</td>
        <td>/boards/{board}</td>
        <td>'board' => board id</td>
    </tr>
    <!-- List -->
    <tr>
        <td rowspan="5">Lists</td>
        <td>Yes</td>
        <td>GET</td>
        <td>/boards/{board}/list</td>
        <td>'board' => board id</td>
    </tr>
    <tr>
        <td>Yes</td>
        <td>GET</td>
        <td>/boards/{board}/list/{list}</td>
        <td>'board' => board id , 'list' => list id</td>
    </tr>
    <tr>
        <td>Yes</td>
        <td>POST</td>
        <td>/boards/{board}/list</td>
        <td>'board' => board id , 'name' => list name</td>
    </tr>
    <tr>
        <td>Yes</td>
        <td>PUT</td>
        <td>/boards/{board}/list/{list}</td>
        <td>'board' => board id, 'list' => list id and 'name' => updated list name</td>
    </tr>
    <tr>
        <td>Yes</td>
        <td>DELETE</td>
        <td>/boards/{board}/list/{list}</td>
        <td>'board' => board id, 'list' => list id </td>
    </tr>
</table>
