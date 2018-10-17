
import React from 'react';
import PropTypes from 'prop-types';
import {withStyles} from '@material-ui/core/styles';
import AppBar from '@material-ui/core/AppBar';
import Toolbar from '@material-ui/core/Toolbar';
import Typography from '@material-ui/core/Typography';
import IconButton from '@material-ui/core/IconButton';
import MenuIcon from '@material-ui/icons/Menu';
import AccountCircle from '@material-ui/icons/AccountCircle';
import MenuItem from '@material-ui/core/MenuItem';
import Menu from '@material-ui/core/Menu';
import Paper from '@material-ui/core/Paper';

const styles = {
    root: {
        flexGrow: 1,
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

        return (
            <div className={classes.root}>
                <AppBar position="static">
                    <Toolbar>
                        <IconButton className={classes.menuButton} color="inherit" aria-label="Menu">
                            <MenuIcon />
                        </IconButton>
                        <img
                            alt="Logo"
                            src="/images/mini_logo.jpg"
                            onClick={this.onButtonClick}
                        />
                        <Typography className={classes.grow}/>

                        <div>
                            <IconButton
                                aria-owns={open ? 'menu-appbar' : null}
                                aria-haspopup="true"
                                onClick={this.handleMenu}
                                color="inherit"
                                className={classes.iconBtn}
                            >
                                <AccountCircle/>
                            </IconButton>
                            <Menu
                                id="menu-appbar"
                                anchorEl={anchorEl}
                                anchorOrigin={{
                                    vertical: 'top',
                                    horizontal: 'right',
                                }}
                                transformOrigin={{
                                    vertical: 'top',
                                    horizontal: 'right',
                                }}
                                open={open}
                                onClose={this.handleClose}
                            >
                                <MenuItem onClick={this.login}>Login</MenuItem>
                                <MenuItem onClick={this.register}>Register</MenuItem>
                            </Menu>
                        </div>

                    </Toolbar>
                </AppBar>
                <Paper>
                    <Typography>
                        Welcome to Ecospotless
                    </Typography>
                </Paper>
            </div>
        );
    }
}

Landing.propTypes = {
    classes: PropTypes.object.isRequired,
};

export default withStyles(styles)(Landing);