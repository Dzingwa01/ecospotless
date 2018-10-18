import React from 'react';
import PropTypes from 'prop-types';
import {withStyles} from '@material-ui/core/styles';
import Dashboard from './Dashboard';
import { BrowserRouter, Route, Link,Switch,Redirect } from "react-router-dom";
import Home from '../components/Home';
const styles = {
    root: {
        flexGrow: 1,
        position: 'relative',
    },
    grow: {
        flexGrow: 1,
    },
    menuButton: {
        marginLeft: -12,
        marginRight: 20,
    },
    avatar: {
        margin: 10,
    },
    imageProp: {
        width: 160,

    },
    list: {
        width: 250,
    },
    fullList: {
        width: 'auto',
    },
    iconBtn: {
        right: 0,
    },
    title: {
        flexGrow: 1,
    },
};

class Master extends React.Component {

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
            loading:true
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
        this.toggleDrawer = this.toggleDrawer.bind(this);
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
        this.setState({ anchorEl: null });
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
                component.setState({auth: true,loading:false});
                console.log("Checks state",component.state);
            } else {
                component.setState({auth: false,loading:false});
            }

        }).catch((error) => {
            console.log("error", error);
            component.setState({auth: false,loading:false});
        });
    }


    render() {
        const {classes} = this.props;
        const {auth, anchorEl, loading} = this.state;
        const open = Boolean(anchorEl);

        return (
            <div className={classes.root}>
                {!loading && !auth && (

                   <Home/>
                    )}
                {auth && !loading && (
                    <BrowserRouter>
                        <Dashboard/>
                    </BrowserRouter>
                )}

            </div>
        );
    }
}

Master.propTypes = {
    classes: PropTypes.object.isRequired,
};

export default withStyles(styles)(Master);