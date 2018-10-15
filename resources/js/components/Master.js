import React from 'react';
import PropTypes from 'prop-types';
import { withStyles } from '@material-ui/core/styles';
import AppBar from '@material-ui/core/AppBar';
import Toolbar from '@material-ui/core/Toolbar';
import Typography from '@material-ui/core/Typography';
import IconButton from '@material-ui/core/IconButton';
import MenuIcon from '@material-ui/icons/Menu';
import AccountCircle from '@material-ui/icons/AccountCircle';
import Avatar from '@material-ui/core/Avatar';
import MenuItem from '@material-ui/core/MenuItem';
import Menu from '@material-ui/core/Menu';
import classNames from 'classnames';
import Drawer from '@material-ui/core/Drawer';
import Button from '@material-ui/core/Button';
import List from '@material-ui/core/List';
import Divider from '@material-ui/core/Divider';
import Dashboard from './Dashboard';
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
    iconBtn:{
        right:0,
    },
    title: {
        flexGrow: 1,
    },
};

class Master extends React.Component {

    constructor(props) {
        super(props);
        this.state = {date: new Date(),
            auth: false,
            anchorEl: null,
            top: false,
            left: false,
            bottom: false,
            right: false,
        };
        this.handle =this.handle.bind(this);
        this.handleMenu =this.handleMenu.bind(this);
        this.handleClose =this.handleClose.bind(this);
        this.register =this.register.bind(this);
        this.login =this.login.bind(this);
        this.onButtonClick =this.onButtonClick.bind(this);
        this.toggleDrawer =this.toggleDrawer.bind(this);
        this.closeDrawer =this.closeDrawer.bind(this);
        this.checkAuthentication = this.checkAuthentication.bind(this);
    }

    componentDidMount() {
        this.toggleDrawer = this.toggleDrawer.bind(this);
       this.checkAuthentication();
    }

    componentWillUnmount() {

    }

    toggleDrawer(){

        this.setState({
            left: true,
        });
    }

    login(){
        // this.setState({ anchorEl: null });
        window.location.href = '/login';
    }
    register(){
        // this.setState({ anchorEl: null });
        window.location.href = '/register';
    }
    
    handle(event){
        this.setState({ auth: event.target.checked });
    }

    handleMenu(event){
        console.log('Checking0',event);
        this.setState({ anchorEl: event.currentTarget });
    }

    handleClose(event){

    }
    onButtonClick(){
        // alert("Clicked");
        window.location.href = "/";

    }
    closeDrawer(){
        this.setState({
            left: false,
        });
    }

    checkAuthentication(){
        let component = this;
        console.log("Check auth","checking");
        axios.get('/admin/check-status').then(function(response){
            console.log("response", response.data);
            if(response.data.status==200){
                component.setState({auth:true});

            }else{
                component.setState({auth:true});
            }

        }).catch((error)=>{
            console.log("error",error);

        });
    }


    render() {
        const { classes } = this.props;
        const { auth, anchorEl,left } = this.state;
        const open = Boolean(anchorEl);

        return (
            <div className={classes.root}>
                {!auth && (
                    <AppBar position="static">
                    <Toolbar>

                                <IconButton className={classes.menuButton} color="inherit" aria-label="Menu" >
                                    <img
                                        alt="Adelle Charles"
                                        src="/images/mini_logo.jpg"
                                        onClick = {this.onButtonClick}
                                    />
                                </IconButton>
                                <Typography
                                    component="h1"
                                    variant="h6"
                                    color="inherit"
                                    noWrap
                                    className={classes.title}
                                >
                                    Home
                                </Typography>
                            <div>
                                <IconButton
                                    aria-owns={open ? 'menu-appbar' : null}
                                    aria-haspopup="true"
                                    onClick={this.handleMenu}
                                    color="inherit"
                                    className={classes.iconBtn}
                                >
                                    <AccountCircle />
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
                                    <MenuItem onClick={this.login} >Login</MenuItem>
                                    <MenuItem onClick={this.register}>Register</MenuItem>
                                </Menu>
                            </div>

                    </Toolbar>
                </AppBar>
                )}
                {auth && (
                  <Dashboard/>
                )}
            </div>
        );
    }
}

Master.propTypes = {
    classes: PropTypes.object.isRequired,
};

export default withStyles(styles)(Master);