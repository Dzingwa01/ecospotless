import React from 'react';
import PropTypes from 'prop-types';
import Avatar from '@material-ui/core/Avatar';
import Button from '@material-ui/core/Button';
import CssBaseline from '@material-ui/core/CssBaseline';
import FormControl from '@material-ui/core/FormControl';
import FormControlLabel from '@material-ui/core/FormControlLabel';
import Checkbox from '@material-ui/core/Checkbox';
import Input from '@material-ui/core/Input';
import InputLabel from '@material-ui/core/InputLabel';
import classNames from 'classnames';
import Paper from '@material-ui/core/Paper';
import Typography from '@material-ui/core/Typography';
import withStyles from '@material-ui/core/styles/withStyles';
import axios from 'axios';
import Snackbar from '@material-ui/core/Snackbar';
import IconButton from '@material-ui/core/IconButton';
import CloseIcon from '@material-ui/icons/Close';
import { Link } from 'react-router-dom';

const styles = theme => ({
    layout: {
        width: 'auto',
        display: 'block', // Fix IE11 issue.
        marginLeft: theme.spacing.unit * 3,
        marginRight: theme.spacing.unit * 3,
        [theme.breakpoints.up(400 + theme.spacing.unit * 3 * 2)]: {
            width: 400,
            marginLeft: 'auto',
            marginRight: 'auto',
        },
    },
    paper: {
        marginTop: theme.spacing.unit * 8,
        display: 'flex',
        flexDirection: 'column',
        alignItems: 'center',
        padding: `${theme.spacing.unit * 2}px ${theme.spacing.unit * 3}px ${theme.spacing.unit * 3}px`,
    },
    row: {
        display: 'flex',
        justifyContent: 'center',
    },
    avatar: {
        margin: 10,
    },
    bigAvatar: {
        width: 300,
        height: 200,
    },
    form: {
        width: '100%', // Fix IE11 issue.
        marginTop: theme.spacing.unit,
    },
    submit: {
        marginTop: theme.spacing.unit * 3,
    },
});

class SignIn extends React.Component {
    constructor(props) {
        super(props);
        this.state={
            user:{
                'email':'',
                'password':''
            }
        };
        console.log("path login",this.props);
        this.handleChange =this.handleChange.bind(this);
        this.handleSubmit =this.handleSubmit.bind(this);
        this.handleClose =this.handleClose.bind(this);
    }
    componentDidMount() {

    }

    componentWillUnmount() {

    }

    handleClose(event, reason){
        if (reason === 'clickaway') {
            window.location.href = '/login';
            return;
        }
        window.location.href = '/login';
        this.setState({ open: false });
    };

    handleChange (event){
        console.log("check",event.target.name);
        let name = event.target.name;
        let user = this.state.user;
        user[name] = event.target.value;
        this.setState({user:user});
    }

    handleSubmit (e){
        e.preventDefault();
        let component = this;
        let user = this.state.user;
        console.log("cur user",user);
        axios.post('/login',user).then(function(response){
            if(response.data.status==200){
                component.setState({message:response.data.message,open:true});
                window.location.href ='/dashboard';
            }else{
                component.setState({message:response.data.message,open:true});
            }

        }).catch((error)=>{
            component.setState({message:response.data.message,open:true});
            this.setState({message:"Error occured please contact support@ecospotless.co.za",open:true});

        });
    }
    render ()
    {
        const {classes} = this.props;
        const {user,message} = this.state;
      return(  <React.Fragment>
            <CssBaseline />
            <main className={classes.layout}>
                <Paper className={classes.paper}>
                    <img
                        alt="Logo"
                        src="/images/logo.jpg"
                        className={classNames(classes.avatar, classes.bigAvatar)}
                    />

                    <Typography component="h1" variant="h5">
                        Sign in
                    </Typography>
                    <form className={classes.form} onSubmit={this.handleSubmit}>
                        <FormControl margin="normal" required fullWidth>
                            <InputLabel htmlFor="email">Email Address</InputLabel>
                            <Input id="email" name="email" autoComplete="email"  value={user.email} onChange={this.handleChange} autoFocus />
                        </FormControl>
                        <FormControl margin="normal" required fullWidth>
                            <InputLabel htmlFor="password">Password</InputLabel>
                            <Input
                                name="password"
                                type="password"
                                id="password"
                                value={user.password}
                                onChange={this.handleChange}
                                autoComplete="current-password"
                            />
                        </FormControl>
                        <FormControlLabel
                            control={<Checkbox value="remember" color="primary" />}
                            label="Remember me"
                        />
                        <br/>
                        <Link to="/register"><Typography>Do have an account? Register</Typography></Link><br/>
                        <Button
                            type="submit"
                            fullWidth
                            variant="contained"
                            color="primary"
                            className={classes.submit}
                        >
                            Sign in
                        </Button>
                    </form>
                    <Snackbar
                        anchorOrigin={{
                            vertical: 'bottom',
                            horizontal: 'left',
                        }}
                        open={this.state.open}
                        autoHideDuration={6000}
                        onClose={this.handleClose}
                        ContentProps={{
                            'aria-describedby': 'message-id',
                        }}
                        message={<span id="message-id">{message}</span>}
                        action={[
                            <Button key="undo" color="secondary" size="small" onClick={this.handleClose}>
                                OK
                            </Button>,
                            <IconButton
                                key="close"
                                aria-label="Close"
                                color="inherit"
                                className={classes.close}
                                onClick={this.handleClose}
                            >
                                <CloseIcon />
                            </IconButton>,
                        ]}
                    />
                </Paper>
            </main>
        </React.Fragment>
    );
}
}

SignIn.propTypes = {
    classes: PropTypes.object.isRequired,
};

export default withStyles(styles)(SignIn);