# API List

<table>
    <tr>
        <th>Section</th>
        <th>Authentication</th>
        <th>Request Type</th>
        <th>Request URL </th>
        <th>Perameters </th>
    </tr>
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
    <tr>
        <td rowspan="5">Boards</td>
        <td>YES</td>
        <td>GET</td>
        <td>/boards</td>
        <td></td>
    </tr>
    <tr>
        <td>YES</td>
        <td>GET</td>
        <td>/boards/{id}</td>
        <td>'id' Field will be board id.</td>
    </tr>
    <tr>
        <td>Yes</td>
        <td>POST</td>
        <td>/boards</td>
        <td>name </td>
    </tr>
    <tr>
        <td>Yes</td>
        <td>PUT</td>
        <td>/boards/{id}</td>
        <td>'id' Field will be board id.</td>
    </tr>
    <tr>
        <td>Yes</td>
        <td>DELETE</td>
        <td>/boards/{id}</td>
        <td>'id' Field will be board id.</td>
    </tr>
</table>
