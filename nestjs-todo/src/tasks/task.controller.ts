import {
  Body,
  Controller,
  Delete,
  Get,
  Param,
  Patch,
  Post,
} from '@nestjs/common';
import { TaskService } from './task.service';

@Controller('tasks')
export class TasksController {
  constructor(private readonly taskService: TaskService) {}

  @Get('/')
  getTasks() {
    return this.taskService.findAll();
  }

  @Get('/:id')
  getTask(@Param('id') id: string) {
    return this.taskService.findOne(Number(id));
  }

  @Post('/')
  createTask(@Body() body: object) {
    return this.taskService.create(body);
  }

  @Patch('/:id/done')
  markTaskAsDone(@Body() body: object, @Param('id') id: string) {
    return this.taskService.update(Number(id), body);
  }

  // @Patch('/:id/pending')
  // markTaskAsPending(@Body() body: any, @Param('id') id: string) {
  //   return this.taskService.updateTask(id, body);
  // }

  @Delete('/:id')
  deleteTask(@Param('id') id: string) {
    return this.taskService.remove(Number(id));
  }
}
