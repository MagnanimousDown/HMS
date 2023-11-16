* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-image: url('Images/admin_dashboard.jpg');
    background-color: #cccccc;
    background-size: cover;
    background-position: center;
    margin: 0;
    position: relative;
    overflow: hidden;
}

body::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('Images/admin_dashboard.jpg');
    background-size: cover;
    background-position: center;
    background-color: rgb(70, 65, 65, 1);
    border: 10px solid rgba(28, 16, 16, 0.2);
    border-radius: 35px;
    filter: blur(5px);
    -webkit-filter: blur(5px);
    z-index: -1;
}


/* Navigation bar Start */

ul.navbar {
    list-style-type: none;
    margin: 0;
    padding:0;
    overflow: hidden;
    border: 2px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(20px);
    border-radius: 15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    color: #fff;
    width: 100%;
    position: absolute; /* Set position to absolute */
    top: 0; /* Position at the top */
    font-weight: 600;
}

ul.navbar li {
    float: left;
}

ul.navbar li a {
    display: block;
    color: #fff;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

ul.navbar li a:hover {
    background-color: #ddd;
}

ul.SignLog {
    list-style-type: none;
    margin: 0;
    float: right;
}

ul.SignLog li {
    display: inline-block;
    margin-left: 10px;
}

ul.SignLog li a {
    display: block;
    color: #fff;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
/* Navigation bar End */

.wrappert {
    width: 90%;
    height: 220px;
    border: 2px solid rgba(255, 255, 255, 0.766);
    backdrop-filter: blur(20px);
    border-radius: 15px;
    padding: 30px 40px 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    color: #333;
    margin-top: 20px;
}

.wrapperb {
    width: 90%;
    height: 300px;
    border: 2px solid rgba(255, 255, 255, 0.766);
    backdrop-filter: blur(20px);
    border-radius: 15px;
    padding: 30px 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    color: #333;
    margin-top: 10px;
}

.wrappert h1 {
    font-size: 36px;
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.wrappert .input-box {
    margin-bottom: 20px;
}

.input-box input {
    width: 50%;
    height: 40px;
    text-align: center;
    background: transparent;
    border: 2px solid #aaa;
    border-radius: 5px;
    font-size: 16px;
    color: #ffffff;
    padding: 10px;
    outline: none;
    margin: 0 auto;
    display: block;
}

.input-box input::placeholder {
    color: #888;
}

.button-container {
    display: flex;
    justify-content: space-around;
    padding-left: 200px;
    padding-right: 200px;
}

.button-containert {
    display: flex;
    justify-content: space-around;
    padding-left: 200px;
    padding-right: 200px;
}

.btn {
    width: 25%;
    height: 45px;
    background: #4caf50;
    border: none;
    outline: none;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    font-size: 16px;
    color: #fff;
    font-weight: 600;
    transition: background 0.3s ease-in-out;
    margin: 0 auto;
    display: block;
}

.btn:hover {
    background: #45a049;
}

.coach-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.coach-table th, .coach-table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

.coach-table th {
    background-color: #f2f2f2;
}

/* Add these styles to your existing CSS code */

.button-container {
    display: flex;
    justify-content: space-around;
    padding-left: 200px;
    padding-right: 200px;
}

.btn {
    width: 25%;
    height: 45px;
    background: #4caf50;
    border: none;
    outline: none;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    font-size: 16px;
    color: #fff;
    font-weight: 600;
    transition: background 0.3s ease-in-out;
    margin: 0 auto;
    display: block;
}

.btn:hover {
    background: #45a049;
}

.button-containert {
    display: flex;
    justify-content: space-around;
    padding-left: 200px;
    padding-right: 200px;
}

.btn-refresh {
    width: 25%;
    height: 45px;
    background: #3498db; /* Change the color as needed */
    border: none;
    outline: none;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    font-size: 16px;
    color: #fff;
    font-weight: 600;
    transition: background 0.3s ease-in-out;
    margin: 0 auto;
    display: block;
}

.btn-refresh:hover {
    background: #2980b9; /* Change the color as needed */
}
