import React from 'react';
import PropTypes from 'prop-types';
import { findDOMNode } from 'react-dom';
import $ from 'jquery';

class Landing extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            date: new Date(),
            auth: false,
            anchorEl: null,
            top: false,
            left: false,
            bottom: false,
            right: false,
        };
        this.handle = this.handle.bind(this);
        this.handleMenu = this.handleMenu.bind(this);
        this.handleClose = this.handleClose.bind(this);
        this.register = this.register.bind(this);
        this.login = this.login.bind(this);
        this.onButtonClick = this.onButtonClick.bind(this);
        this.toggleDrawer = this.toggleDrawer.bind(this);
        this.closeDrawer = this.closeDrawer.bind(this);
        this.checkAuthentication = this.checkAuthentication.bind(this);
    }

    componentDidMount() {

        this.checkAuthentication();
    }

    componentWillUnmount() {

    }

    toggleDrawer() {

        this.setState({
            left: true,
        });
    }

    login() {
        // this.setState({ anchorEl: null });
        window.location.href = '/login';
    }

    register() {
        // this.setState({ anchorEl: null });
        window.location.href = '/register';
    }

    handle(event) {
        this.setState({auth: event.target.checked});
    }

    handleMenu(event) {
        console.log('Checking0', event);
        this.setState({anchorEl: event.currentTarget});
    }

    handleClose(event) {
        this.setState({anchorEl: null});
    }

    onButtonClick() {
        // alert("Clicked");
        window.location.href = "/";

    }

    closeDrawer() {
        this.setState({
            left: false,
        });
    }

    checkAuthentication() {
        let component = this;
        console.log("Check auth", "checking");
        axios.get('/admin/check-status').then(function (response) {
            console.log("response", response.data);
            if (response.data.status == 200) {
                component.setState({auth: true});
            } else {
                component.setState({auth: false});
            }

        }).catch((error) => {
            console.log("error", error);
            component.setState({auth: false});
        });
    }


    render() {
        const {classes} = this.props;
        const {auth, anchorEl, left} = this.state;
        const open = Boolean(anchorEl);
        const cards = [1, 2, 3, 4];
        return (
            <div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span className="navbar-toggler-icon"></span>
                    </button>

                    <div className="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul className="navbar-nav mr-auto">
                            <li className="nav-item active">
                                <a className="nav-link" href="#">Home <span className="sr-only">(current)</span></a>
                            </li>
                            <li className="nav-item">
                                <a className="nav-link" href="#">Link</a>
                            </li>
                            <li className="nav-item dropdown">
                                <a className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown
                                </a>
                                <div className="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a className="dropdown-item" href="#">Action</a>
                                    <a className="dropdown-item" href="#">Another action</a>
                                    <div className="dropdown-divider"></div>
                                    <a className="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li className="nav-item">
                                <a className="nav-link disabled" href="#">Disabled</a>
                            </li>
                        </ul>
                        <form className="form-inline my-2 my-lg-0">
                            <input className="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"/>
                                <button className="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </div>
        );
    }
}


export default Landing;