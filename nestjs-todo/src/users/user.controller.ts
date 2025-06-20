import {
  Get,
  Param,
  Controller,
  Post,
  Body,
  Patch,
  Delete,
} from '@nestjs/common';
import { UsersService } from './user.service';
import { createUserDto } from './dto/create-user.dto';

@Controller('users')
export class UsersController {
  constructor(private readonly userService: UsersService) {}

  @Get('/')
  getUsers() {
    return this.userService.findAll();
  }

  @Get('/:id')
  getUser(@Param('id') id: string) {
    return this.userService.findOne(Number(id));
  }

  @Post('/')
  createUser(@Body() body: createUserDto) {
    return this.userService.create(body);
  }

  @Patch('/:id')
  updateUser(
    @Param('id') id: string,
    @Body() body: { email: string; password: string }
  ) {
    return this.userService.update(Number(id), body);
  }

  @Delete('/:id')
  deleteUser(@Param('id') id: string) {
    return this.userService.remove(Number(id));
  }
}
