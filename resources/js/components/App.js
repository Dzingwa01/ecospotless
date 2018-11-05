import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import PropTypes from 'prop-types';
import Master from './Master';
import $ from 'jquery';
require('materialize-css/dist/css/materialize.css');
require('materialize-css/dist/js/materialize');
require ('../style.css');
// const theme = createMuiTheme({
//     palette: {
//         primary: {
//             // light: will be calculated from palette.primary.main,
//             main: '#22BC67',
//             // dark: will be calculated from palette.primary.main,
//             // contrastText: will be calculated to contrast with palette.primary.main
//         },
//         secondary: {
//             light: '#1393FF',
//             main: '#1393FF',
//             // dark: will be calculated from palette.secondary.main,
//             contrastText: '#fff',
//         },
//         // error: will use the default color
//     },
//     typography: {
//         // Use the system font instead of the default Roboto font.
//         useNextVariants: true
//
//     },
// });

class App extends Component {
    render () {
        return (
            <Master/>
        )
    }
}

export default App;